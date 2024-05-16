// server.js
const express = require('express');
const app = express();
const path = require('path');

// 정적 파일 제공
app.use(express.static(path.join(__dirname, 'public')));

// 포트 설정
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
