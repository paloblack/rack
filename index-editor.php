<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ("php/connect.php"); ?>
<!DOCTYPE html>
<html lang=es dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>´
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>

  </head>
  <body>
    <script src="simple-image.js"></script>
    <link href="simple-image.css" rel="stylesheet"/>

    <div id="editorjs"></div>

    <button id="save-button">Save</button>
    <pre id="output"></pre>

    <script>
    const ImageTool = window.ImageTool;

        const editor = new EditorJS({
          autofocus: true,
          tools: {
          image: {
            class: ImageTool,
            config: {
              endpoints: {
                byFile: 'http://localhost:8888/rack/', // Your backend file uploader endpoint
                byUrl: 'http://localhost:8888/rack/', // Your endpoint that provides uploading by Url
              }
            }
          },
          header: {
            class: Header,
            config: {
              placeholder: 'Enter a header',
              levels: [2, 3, 4],
              defaultLevel: 3
            }
          },
          embed: {
            class: Embed,
            config: {
              services: {
                youtube: true,
                coub: true,
                codepen: {
                  regex: /https?:\/\/codepen.io\/([^\/\?\&]*)\/pen\/([^\/\?\&]*)/,
                  embedUrl: 'https://codepen.io/<%= remote_id %>?height=300&theme-id=0&default-tab=css,result&embed-version=2',
                  html: "<iframe height='300' scrolling='no' frameborder='no' allowtransparency='true' allowfullscreen='true' style='width: 100%;'></iframe>",
                  height: 300,
                  width: 600,
                  id: (groups) => groups.join('/embed/')
                }
              }
            }
          },
          list: {
            class: List,
            inlineToolbar: true,
          },
          }
        });

        const saveButton = document.getElementById('save-button');
        const output = document.getElementById('output');

        saveButton.addEventListener('click', () => {
          editor.save().then( savedData => {
            output.innerHTML = JSON.stringify(savedData, null, 4);
          })
        })
    </script>
  </body>
</html>
