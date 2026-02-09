<?php

if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] !== 0) {
    die("No file uploaded or upload error");
}

/* ========= SAVE FILE ========= */

$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$fileName = time() . "_" . basename($_FILES['csv_file']['name']);
$targetFile = $uploadDir . $fileName;

if (!move_uploaded_file($_FILES['csv_file']['tmp_name'], $targetFile)) {
    die("Failed to move uploaded file");
}

/* ========= READ CSV ========= */

$file = fopen($targetFile, "r");
$headers = fgetcsv($file);

$colCount = count($headers);
$rowCount = 0;

$sum = $count = $min = $max = [];
$uniqueValues = [];

while (($row = fgetcsv($file)) !== false) {
    $rowCount++;

    for ($i = 0; $i < $colCount; $i++) {

        if (!isset($row[$i]) || $row[$i] === "") continue;

        if (is_numeric($row[$i])) {
            $value = (float)$row[$i];

            $sum[$i]   = ($sum[$i] ?? 0) + $value;
            $count[$i] = ($count[$i] ?? 0) + 1;
            $min[$i]   = isset($min[$i]) ? min($min[$i], $value) : $value;
            $max[$i]   = isset($max[$i]) ? max($max[$i], $value) : $value;
        } else {
            $uniqueValues[$i][$row[$i]] = true;
        }
    }
}

fclose($file);

/* ========= DISPLAY SUMMARY ========= */

echo "<h2>CSV Upload Successful ✅</h2>";
echo "<p><b>File Name:</b> $fileName</p>";
echo "<p><b>Total Rows:</b> $rowCount</p>";
echo "<p><b>Total Columns:</b> $colCount</p>";

echo "<h3>Data-Level Summary</h3>";

echo "<table border='1' cellpadding='8'>
<tr>
<th>Column</th>
<th>Type</th>
<th>Min</th>
<th>Max</th>
<th>Mean</th>
<th>Unique Values</th>
</tr>";

for ($i = 0; $i < $colCount; $i++) {

    if (isset($count[$i])) {
        $avg = $sum[$i] / $count[$i];
        echo "<tr>
            <td>{$headers[$i]}</td>
            <td>Numeric</td>
            <td>{$min[$i]}</td>
            <td>{$max[$i]}</td>
            <td>" . round($avg, 2) . "</td>
            <td>-</td>
        </tr>";
    } else {
        $uniqueCount = isset($uniqueValues[$i]) ? count($uniqueValues[$i]) : 0;
        echo "<tr>
            <td>{$headers[$i]}</td>
            <td>Non-Numeric</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>$uniqueCount</td>
        </tr>";
    }
}

echo "</table>";
// Prepare summary CSV content
$summaryCsv = fopen('php://memory', 'w'); // write to memory

// Add headers
fputcsv($summaryCsv, ['Column', 'Type', 'Min', 'Max', 'Mean', 'Unique Values']);

for ($i = 0; $i < $colCount; $i++) {
    if (isset($count[$i])) {
        $avg = $sum[$i] / $count[$i];
        fputcsv($summaryCsv, [
            $headers[$i],
            'Numeric',
            $min[$i],
            $max[$i],
            round($avg, 2),
            '-'
        ]);
    } else {
        $uniqueCount = isset($uniqueValues[$i]) ? count($uniqueValues[$i]) : 0;
        fputcsv($summaryCsv, [
            $headers[$i],
            'Non-Numeric',
            '-',
            '-',
            '-',
            $uniqueCount
        ]);
    }
}

// Reset pointer to start of memory
fseek($summaryCsv, 0);

// Save summary CSV file in uploads folder (optional)
$summaryFileName = "summary_" . time() . ".csv";
$summaryFilePath = __DIR__ . "/uploads/" . $summaryFileName;
file_put_contents($summaryFilePath, stream_get_contents($summaryCsv));
fclose($summaryCsv);

// Show download link for summary
echo "<h3>Download Summary</h3>";
echo "<a href='uploads/$summaryFileName' download>Download CSV Summary</a>";

?>
