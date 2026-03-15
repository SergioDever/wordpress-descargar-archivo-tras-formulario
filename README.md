# Descargar archivo tras enviar formulario en WordPress

Este script permite descargar un archivo almacenado en WordPress utilizando el parámetro `post_id`.

## Caso típico de uso

1. El usuario hace clic en **Descargar**
2. Se abre un **popup con un formulario**
3. Tras enviar el formulario se activa la descarga del archivo

Este método evita exponer la URL directa del archivo y permite capturar leads antes de descargar el recurso.

---

## Cómo funciona

El script recibe un parámetro `post_id` en la URL:

`download-modelo.php?post_id=123`

Con ese ID el script:

- Lee el campo personalizado del post
- Obtiene el archivo guardado en la biblioteca de medios de WordPress
- Fuerza la descarga del archivo mediante cabeceras PHP

---

## Ejemplo de URL

`https://tudominio.com/download-modelo.php?post_id=123`

---

## Requisitos

- WordPress
- Un campo personalizado que contenga el archivo descargable
- En este ejemplo el campo se llama:

`archivo_descargable`

---

## Uso típico con Elementor o JetEngine

Dentro de un listing dinámico puedes generar el enlace así:

`/download-modelo.php?post_id=%current_id%`

De esta forma cada item descargará su propio archivo.

---

## Caso de uso habitual

Este sistema se usa normalmente para:

- Lead magnets
- Descarga de plantillas
- Recursos descargables
- Documentos técnicos
- Archivos Excel o PDF

Primero se captura el lead mediante un formulario y después se habilita la descarga.

---

## Licencia

Uso libre. Puedes modificarlo y adaptarlo a tu proyecto.
