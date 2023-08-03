
CREATE TABLE `provincias` (
  `id` INT(7) PRIMARY KEY,
  `nombre` VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

INSERT INTO `provincias` (`id`, `nombre`) VALUES ('1', 'San José'), ('2', 'Alajuela'), ('3', 'Cartago'), ('4', 'Heredia'), ('5', 'Guanacaste'), ('6', 'Puntarenas'), ('7', 'Limón');

CREATE TABLE restaurants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  calification DECIMAL(2, 1) NOT NULL,
  food_type VARCHAR(50) NOT NULL,
  province_id INT NOT NULL,
  image LONGBLOB,
  FOREIGN KEY (province_id) REFERENCES provincias(id)
) ENGINE = InnoDB;

INSERT INTO restaurants (name, calification, food_type, province_id) VALUES
  ('Tenedor Argentino', 4.3, 'SteakHouse', 1),
  ('Chiwake', 4.5, 'Peruano', 2),
  ('La Casona Mexicana', 4.3, 'Mexicano', 3),
  ('La Candelaria', 4.6, 'Restaurante y Cafe', 4),
  ('Kimbute', 4.7, 'Mariscos y Cómida Rápida', 5),
  ('Bamboo', 4.3, 'Cómida tipica y Cómida Rápida', 6),
  ('Red Snapper', 4.1, 'Comida caribeña', 7);

  CREATE TABLE opiniones (
  id INT PRIMARY KEY AUTO_INCREMENT,
  restaurante_id INT NOT NULL,
  idUsuario INT NOT NULL,
  opinion TEXT,
  calification DECIMAL(2, 1) NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (restaurante_id) REFERENCES restaurants(id),
  FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
) ENGINE = InnoDB;
