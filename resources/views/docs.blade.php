<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="./swagger-ui.css" />
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel="icon" href="{{ asset('asset/color-logo.png') }}" />
</head>

<body>
    <div id="swagger-ui"></div>
    <script src="./swagger-ui-bundle.js" charset="UTF-8"></script>
    <!-- <script src="./swagger-ui-standalone-preset.js" charset="UTF-8"></script> -->
    <script>
        window.onload = function() {
            //<editor-fold desc="Changeable Configuration Block">

            // the following lines will be replaced by docker/configurator, when it runs in a docker-container
            window.ui = SwaggerUIBundle({
                url: "https://petstore.swagger.io/v2/swagger.json",
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],
                layout: "StandaloneLayout"
            });

            //</editor-fold>
        };
    </script>
</body>

</html>
