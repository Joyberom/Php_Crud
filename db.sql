Create database Crud_Pdo_2104630;

use Crud_Pdo_2104630;

CREATE TABLE `Clientes` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(128) NOT NULL,
  `Direccion` varchar(128) NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Clientes` (`Id`, `Nombre`, `Direccion`, `Telefono`) VALUES
(1, 'Juan Peralta', 'Bogota', '3112589658'),
(2, 'Julian cortes', 'Ibague', '3124569874'),
(3, 'Sonia wilches', 'Medellin', '3201457879'),
(4, 'Rafael ,Mina', 'Ibague', '3134569878');


CREATE TABLE `Login` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Login` (`Id`, `Nombre`, `Email`, `Password`) VALUES
(1, 'Web Administrator', 'Joseph@gmail.com', '$2y$10$nb6otmA4BXPb6jUnF0wCJO4qqRj0NdwKXw/UdynynOvb.PHqAOG0C');

Select * from  Login;

ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `Login`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

ALTER TABLE `Clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `Login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

