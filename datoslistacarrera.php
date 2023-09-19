// Datos ficticios,  a remplazar con los de la base de datos
                            $datos = [
                                ["002", "res-2023", "res-2023", "Tecnicatura Superior en desarrollo de Software", "Tecnico Superior en desarrollo de Software", "3 años", "4", "10","Activo"],
                                ["002", "res-2024", "res-2024", "Tecnicatura Superior en inteligencia artificial", "Tecnico Superior en redes informáticas", "3 años", "4", "10","Activo"],
                                ["002", "res-2024", "res-2024", "Tecnicatura Superior en animación computarizada", "Tecnico Superior en animación computarizada", "2,5 años", "4", "10","Activo"]
                            ];

                            // Generar filas de la tabla
                            foreach ($datos as $fila) {
                                echo "<tr>";
                                foreach ($fila as $valor) {
                                    echo "<td>$valor</td>";
                                }
                                echo "<td><a href='#' class='btn btn-custom-edit'><i class='fas fa-pencil-alt'></i></a></td>";
                                echo "<td><a href='#' class='btn btn-custom-view'><i class='fas fa-eye'></i></a></td>";
                                    ;
            
                                echo "</tr>";
                            }