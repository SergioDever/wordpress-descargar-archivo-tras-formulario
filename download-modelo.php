<?php

require_once(__DIR__ . '/wp-load.php');

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if (!$post_id) {
    die('Error: ID not valid.');
}

$file_field = get_post_meta($post_id, 'archivo_descargable', true);

if (!$file_field) {
    die('Error: No file found.');
}

$file_path = '';

if (is_numeric($file_field)) {

    $file_path = get_attached_file($file_field);

} else {

    $file_url = $file_field;

    $upload_dir = wp_upload_dir();

    $file_path = str_replace(
        $upload_dir['baseurl'],
        $upload_dir['basedir'],
        $file_url
    );
}

if (!$file_path || !file_exists($file_path)) {
    die('Error: file not found.');
}

$file_name = basename($file_path);
$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

$mime_types = [
    'pdf' => 'application/pdf',
    'xls' => 'application/vnd.ms-excel',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
];

$content_type = $mime_types[$extension] ?? 'application/octet-stream';

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Content-Type: ' . $content_type);
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Content-Transfer-Encoding: binary');

readfile($file_path);
exit;
