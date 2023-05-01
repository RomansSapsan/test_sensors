CREATE TABLE IF NOT EXISTS sensors (
     id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
     sensorName VARCHAR(255) UNIQUE,
     sensor_uuid INT UNIQUE,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS readings (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    sensor_uuid INTEGER NOT NULL,
    temperature REAL NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(sensor_uuid) REFERENCES sensors(sensor_uuid)
);