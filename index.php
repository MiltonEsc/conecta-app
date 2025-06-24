<?php
// ======================================================================
// INICIO DE LA LÓGICA PHP
// ======================================================================
// Es una buena práctica procesar todos los datos antes de enviar cualquier HTML.

// 1. INCLUDES Y SESIÓN
// Se incluyen los archivos de configuración y se inicia la sesión de forma segura.
// NOTA: Asegúrate de que las rutas son correctas para tu proyecto.
require_once $_SERVER['DOCUMENT_ROOT'] . '/AUTO-EMAIL/conexion/db.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/AUTO-EMAIL/conexion/sessiones.php';

// 2. OBTENER MENSAJES FLASH DE LA SESIÓN
// Obtenemos los mensajes (ej. "Usuario guardado con éxito") para mostrarlos una sola vez.
$flash_message = $_SESSION['message'] ?? null;
$flash_message_type = $_SESSION['message_type'] ?? null;
if ($flash_message) {
    // Se limpia la sesión para que el mensaje no vuelva a aparecer.
    unset($_SESSION['message'], $_SESSION['message_type']);
}

// 3. CONSULTAS A LA BASE DE DATOS (CON SENTENCIAS PREPARADAS)

// --- Consulta para Próximos Cumpleaños (próximos 10 días) ---
// Esta consulta es segura y maneja correctamente el cambio de año.
$proximos_cumpleanos = [];
$sql_cumpleanos = "
    SELECT nombres, fecha_nacimiento
    FROM personas
    WHERE estado = 1 AND (
        MAKEDATE(YEAR(CURDATE()), DAYOFYEAR(fecha_nacimiento)) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 10 DAY)
        OR
        MAKEDATE(YEAR(CURDATE()) + 1, DAYOFYEAR(fecha_nacimiento)) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 10 DAY)
    )
    ORDER BY MONTH(fecha_nacimiento), DAY(fecha_nacimiento)
";

if ($stmt_cumpleanos = $mysqli->prepare($sql_cumpleanos)) {
    $stmt_cumpleanos->execute();
    $result_cumpleanos = $stmt_cumpleanos->get_result();
    while ($row = $result_cumpleanos->fetch_assoc()) {
        $proximos_cumpleanos[] = $row;
    }
    $stmt_cumpleanos->close();
} else {
    // Manejo de error si la consulta falla
    error_log("Error en la preparación de la consulta de cumpleaños: " . $mysqli->error);
}


// --- Consulta para la Tabla de Todos los Empleados Activos ---
$empleados_activos = [];
$sql_empleados = "SELECT id, nombres, fecha_nacimiento, cargo, exten, correo, departamento, fecha_ingreso FROM personas WHERE estado = 1 ORDER BY nombres ASC";

if ($stmt_empleados = $mysqli->prepare($sql_empleados)) {
    $stmt_empleados->execute();
    $result_empleados = $stmt_empleados->get_result();
    while ($row = $result_empleados->fetch_assoc()) {
        $empleados_activos[] = $row;
    }
    $stmt_empleados->close();
} else {
    // Manejo de error si la consulta falla
    error_log("Error en la preparación de la consulta de empleados: " . $mysqli->error);
}

$mysqli->close(); // Cerramos la conexión a la base de datos al final de las consultas.

// Función de ayuda para sanear la salida y prevenir ataques XSS.
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// ======================================================================
// INICIO DE LA PLANTILLA HTML (VISTA)
// ======================================================================
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | Superbrix</title>
    
    <!-- Carga de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts e Iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        /* Estilos para el modal de confirmación */
        .modal-backdrop {
            transition: opacity 0.3s ease;
        }
        .modal-content {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="flex">
    
    <!-- Sidebar con enlaces del usuario, estilizada con Tailwind CSS -->
    <div class="bg-gray-900 text-gray-300 w-64 p-4 space-y-6 flex-shrink-0 hidden md:flex md:flex-col" style="background-color: #2F2E41;">
        <a href="/AUTO-EMAIL/home.php" class="text-2xl font-bold text-center text-white">
            SuperBrix S.A
        </a>
        <nav class="flex-grow">
            <ul class="space-y-2">
                <li>
                    <a href="/AUTO-EMAIL/home.php" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200 bg-orange-600 text-white font-bold">
                        <i class="material-icons">dashboard</i>
                        <span>INICIO</span>
                    </a>
                </li>
                <li>
                    <a href="/AUTO-EMAIL/Controllers/template_model.php" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <i class="material-icons">person</i>
                        <span>PLANTILLAS</span>
                    </a>
                </li>
                 <li>
                    <a href="/AUTO-EMAIL/Controllers/galeria.php" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <i class="material-icons">camera</i>
                        <span>FOTOS DE PERFIL</span>
                    </a>
                </li>
                <li>
                    <a href="/AUTO-EMAIL/Controllers/usuarios_inactivos.php" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <i class="material-icons">visibility</i>
                        <span>USUARIOS INACTIVOS</span>
                    </a>
                </li>
                <li>
                    <a href="/AUTO-EMAIL/bdtest.php" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200 text-orange-400 hover:bg-gray-700 font-semibold">
                        <i class="material-icons">email</i>
                        <span>ENVIAR CORREO</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pt-4 border-t border-gray-700">
            <p class="text-xs text-gray-500 text-center">© Superbrix SA</p>
        </div>
    </div>


    <div class="flex-1 flex flex-col">
        <!-- Aquí iría tu Navbar (Barra de Navegación Superior) -->
        <!-- <?php include $_SERVER['DOCUMENT_ROOT'] . "/AUTO-EMAIL/Views/pages/navbar.php"; ?> -->
        <header class="bg-white shadow-md p-4">
            <h1 class="text-xl font-semibold text-gray-700">Panel Principal</h1>
        </header>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="container mx-auto">

                <!-- Alerta Flash (si existe) -->
                <?php if ($flash_message): ?>
                    <div class="p-4 mb-6 text-sm rounded-lg <?php echo $flash_message_type == 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>" role="alert">
                        <?php echo $flash_message; ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Columna Izquierda: Formulario y Tabla Principal -->
                    <div class="lg:col-span-2 space-y-6">

                        <!-- Card: Registrar Nueva Persona -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="border-b border-gray-200 pb-4 mb-4">
                                <h2 class="text-xl font-bold text-yellow-600">Registrar una Nueva Persona</h2>
                                <p class="text-gray-500 text-sm mt-1">Complete el formulario para agregar un nuevo empleado.</p>
                            </div>
                            <form action="Controllers/save-empleado.php" method="post" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="md:col-span-2">
                                        <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                        <input type="text" name="nombres" id="nombres" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" required>
                                    </div>
                                    <div>
                                        <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                        <input type="email" name="correo" id="correo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                    </div>
                                    <div>
                                        <label for="nac" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                        <input type="date" name="nac" id="nac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" required>
                                    </div>
                                    <div>
                                        <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo en la Empresa</label>
                                        <input type="text" name="cargo" id="cargo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" required>
                                    </div>
                                     <div>
                                        <label for="fecha-ingreso" class="block text-sm font-medium text-gray-700">Fecha de Ingreso</label>
                                        <input type="date" name="fecha-ingreso" id="fecha-ingreso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" required>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" name="save-empleado" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Agregar Persona
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Card: Tabla de Empleados -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Tabla de Empleados Activos</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ingreso</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($empleados_activos as $empleado): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= e($empleado['nombres']) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= e($empleado['cargo']) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= e($empleado['correo']) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= e($empleado['fecha_ingreso']) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <!-- BOTÓN DE ACCIONES CORREGIDO -->
                                                <a href="Controllers/edit-empleado.php?id=<?= e($empleado['id']) ?>" class="text-yellow-600 hover:text-yellow-900 mr-4">Editar</a>
                                                <a href="Controllers/delete-empleado.php?id=<?= e($empleado['id']) ?>" 
                                                   class="text-red-600 hover:text-red-900 action-trigger"
                                                   data-title="¿Desactivar Usuario?"
                                                   data-message="¿Estás seguro que deseas desactivar a <?= e($empleado['nombres']) ?>? Esta acción se puede revertir."
                                                   data-confirm-text="Sí, desactivar">
                                                   Desactivar
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                         <?php if (empty($empleados_activos)): ?>
                                            <tr>
                                                <td colspan="5" class="text-center py-4 text-gray-500">No hay empleados activos registrados.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- Columna Derecha: Acciones Manuales y Próximos Cumpleaños -->
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                             <h2 class="text-xl font-bold text-red-600 mb-4">Acciones Manuales</h2>
                             <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-600 mb-2">Enviar correo de cumpleaños a los festejados del día de hoy.</p>
                                     <a href="send_email_html.php" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 action-trigger"
                                       data-title="¿Enviar Correos de Cumpleaños?"
                                       data-message="Se enviará un correo a todos los usuarios que cumplen años hoy. ¿Deseas continuar?"
                                       data-confirm-text="Sí, Enviar">
                                        <i class="material-icons mr-2">celebration</i> Enviar Cumpleaños
                                     </a>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-2">Enviar correo de bienvenida a los empleados que ingresaron hoy.</p>
                                     <a href="../../send-auto-email-welcome.php" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 action-trigger"
                                       data-title="¿Enviar Correos de Bienvenida?"
                                       data-message="Se enviará un correo a todos los usuarios nuevos del día. ¿Deseas continuar?"
                                       data-confirm-text="Sí, Enviar">
                                         <i class="material-icons mr-2">emoji_people</i> Enviar Bienvenidas
                                     </a>
                                </div>
                             </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold text-yellow-600 mb-4">Próximos Cumpleaños (10 días)</h2>
                            <ul class="divide-y divide-gray-200">
                                <?php foreach ($proximos_cumpleanos as $cumpleanero): ?>
                                <li class="py-3 flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-800"><?= e($cumpleanero['nombres']) ?></span>
                                    <span class="text-sm text-gray-500"><?= e(date("d \d\e F", strtotime($cumpleanero['fecha_nacimiento']))) ?></span>
                                </li>
                                <?php endforeach; ?>
                                <?php if (empty($proximos_cumpleanos)): ?>
                                    <li class="py-3 text-center text-sm text-gray-500">No hay cumpleaños en los próximos 10 días.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal de Confirmación Genérico -->
    <div id="confirmation-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 z-50 hidden modal-backdrop" >
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md modal-content transform scale-95">
            <div class="p-6">
                <h3 id="modal-title" class="text-lg font-medium leading-6 text-gray-900"></h3>
                <div class="mt-2">
                    <p id="modal-message" class="text-sm text-gray-500"></p>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-lg">
                <button id="modal-confirm-button" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Confirmar
                </button>
                <button id="modal-cancel-button" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('confirmation-modal');
        const modalBackdrop = modal.querySelector('.modal-backdrop');
        const modalContent = modal.querySelector('.modal-content');
        const modalTitle = document.getElementById('modal-title');
        const modalMessage = document.getElementById('modal-message');
        const confirmButton = document.getElementById('modal-confirm-button');
        const cancelButton = document.getElementById('modal-cancel-button');
        let targetUrl = '';

        // Función para mostrar el modal
        const showModal = () => {
            modal.classList.remove('hidden');
            modalBackdrop.classList.remove('opacity-0');
            modalBackdrop.classList.add('opacity-100');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        };

        // Función para ocultar el modal
        const hideModal = () => {
            modalBackdrop.classList.remove('opacity-100');
            modalBackdrop.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            setTimeout(() => modal.classList.add('hidden'), 300);
        };

        // Escuchar clics en los enlaces/botones que necesitan confirmación
        document.querySelectorAll('.action-trigger').forEach(trigger => {
            trigger.addEventListener('click', function(event) {
                event.preventDefault(); // Prevenir la navegación inmediata
                
                // Obtener datos del enlace clickeado
                targetUrl = this.href;
                modalTitle.textContent = this.dataset.title || 'Confirmar Acción';
                modalMessage.textContent = this.dataset.message || '¿Estás seguro de que deseas continuar?';
                confirmButton.textContent = this.dataset.confirmText || 'Confirmar';

                // Aplicar clases de color si están definidas (ej. para un botón de peligro)
                if(this.classList.contains('text-red-600')) {
                    confirmButton.className = confirmButton.className.replace(/bg-\w+-600/, 'bg-red-600').replace(/hover:bg-\w+-700/, 'hover:bg-red-700');
                } else if(this.classList.contains('bg-blue-600')) {
                    confirmButton.className = confirmButton.className.replace(/bg-\w+-600/, 'bg-blue-600').replace(/hover:bg-\w+-700/, 'hover:bg-blue-700');
                } else if(this.classList.contains('bg-green-600')) {
                     confirmButton.className = confirmButton.className.replace(/bg-\w+-600/, 'bg-green-600').replace(/hover:bg-\w+-700/, 'hover:bg-green-700');
                }

                showModal();
            });
        });

        // Acción al hacer clic en el botón de confirmar del modal
        confirmButton.addEventListener('click', () => {
            if (targetUrl) {
                window.location.href = targetUrl;
            }
        });

        // Acción al hacer clic en el botón de cancelar o fuera del modal
        cancelButton.addEventListener('click', hideModal);
        modal.addEventListener('click', (event) => {
            if(event.target === modal) {
                hideModal();
            }
        });
    });
    </script>
</body>
</html>
