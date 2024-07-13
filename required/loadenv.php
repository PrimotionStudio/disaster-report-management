<?php
function loadEnv() {
  $envFilePath = __DIR__ . '/required/.env';
  if (!file_exists($envFilePath)) {
    throw new Exception(".env file not found");
  }

  $lines = file($envFilePath, FILE_IGNORE_NEW_LINES);
  foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line) || $line[0] === '#') {
      continue;
    }
    [$key, $value] = explode('=', $line, 2);
    putenv("$key=$value");
  }
}

try {
    loadEnv();
} catch (Exception $e) {
    $_SESSION['alert'] = "Cannot access safety information from server";
    header('location: ../index');
    exit;
}
