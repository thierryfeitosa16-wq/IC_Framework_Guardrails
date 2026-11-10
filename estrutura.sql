
CREATE DATABASE IC_Framework;

USE IC_Framework;

CREATE TABLE historico (

    id INT AUTO_INCREMENT PRIMARY KEY,

    pergunta TEXT NOT NULL,

    resposta TEXT NOT NULL,

    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
