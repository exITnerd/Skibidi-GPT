[Console]::OutputEncoding = [System.Text.Encoding]::UTF8

function Run-PHPScript {
    param(
        [string]$start_letter,
        [string]$end_letter,
        [string]$phpScriptPath
    )

    Write-Host "Running a PHP script for the letters from $start_letter to $end_letter"

    Start-Job -ScriptBlock {
        param($start_letter, $end_letter, $phpScriptPath)
        Write-Host "Running PHP for Scope: $start_letter - $end_letter"
        Start-Process php -ArgumentList "-d default_charset=UTF-8", "$phpScriptPath $start_letter $end_letter" -Wait
    } -ArgumentList $start_letter, $end_letter, $phpScriptPath
}

$phpScript = "C:\Users\exitn\Desktop\php-scraper\scraper.php"

$letterRanges = @(
    @{start="A"; end="B"},
    @{start="C"; end="D"},
    @{start="E"; end="F"},
    @{start="G"; end="I"},
    @{start="J"; end="K"},
    @{start="L"; end="Ł"},
    @{start="M"; end="O"},
    @{start="P"; end="R"},
    @{start="S"; end="Ś"},
    @{start="T"; end="U"},
    @{start="V"; end="Y"},
    @{start="Z"; end="Ż"}
)

$startTime = Get-Date -Format "yyyy-MM-dd HH:mm:ss"

foreach ($range in $letterRanges) {
    Run-PHPScript -start_letter $range.start -end_letter $range.end -phpScriptPath $phpScript
}

Write-Host "All jobs running!"
Write-Host "Script start time: $startTime"
