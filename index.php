<?php
// Set the URL of the JSON Resume
$resume_url = 'https://registry.jsonresume.org/mikeschinkel';

// Determine display method from query string
$display_method = 'fetch';  // default method
if (isset($_GET['fetch'])) {
    $display_method = 'fetch';
} elseif (isset($_GET['iframe'])) {
    $display_method = 'iframe';
}

if ($display_method === 'iframe'):
    // Method 1: Using iframe
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mike Schinkel's Resume</title>
        <style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden;
            }
            iframe {
                width: 100%;
                height: 100%;
                border: none;
            }
        </style>
    </head>
    <body>
        <iframe src="<?php echo htmlspecialchars($resume_url); ?>" title="Mike Schinkel's Resume"></iframe>
    </body>
    </html>
<?php
else:
    // Method 2: Fetching content
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => [
                'User-Agent: PHP/'.phpversion(),
                'Accept: text/html,application/xhtml+xml'
            ]
        ]
    ]);

    $content = file_get_contents($resume_url, false, $context);

    if ($content === false) {
        http_response_code(500);
        echo 'Error fetching resume content';
    } else {
        // Send the content as-is
        echo $content;
    }
endif;