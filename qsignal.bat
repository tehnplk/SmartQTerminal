@ECHO OFF
cd D:/xampp/htdocs/qsignal
pm2 start index.js --name qsignal
ECHO ============================
ECHO Congratulations! pm2 start successfully.
ECHO ============================
PAUSE