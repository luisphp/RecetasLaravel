<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->insert([
            'titulo' => 'Paella Mixta',
            'Ingredientes' => '1/2 kg de arroz, 250 g de salchichas blancas, 6 langostinos, 1/4 kg de congrio, 1/4 kg de calamares pequeños, 1/4 kg de almejas, 200 g de lomo de cerdo, 1 pollo pequeño, 1 cucharada de tomate, 1 lata pequeña de pimientos, 1 lata de guisantes, cebolla, ajo, perejil, azafrán, aceite y sal.',
            'preparacion' => 'Se pueden suprimir los que no gusten o no convengan. Se pone el pollo cubierto de agua fría en una cazuela -no conviene excederse con la cantidad de agua para que no sobre al agregarla al arroz- con un trozo de cebolla, un diente de ajo y una rama de perejil. Una vez cocido, se saca y se deja enfriar, reservando el caldo. Las almejas, lavadas, se ponen en un cazo con un pocillo de agua sobre el fuego, y a medida que abren se pasan con una espumadera a otro recipiente, quitándoles media cáscara. El caldo se filtra con un paño fino y se mezcla con el otro caldo. En otra cazuela, con la mitad del aceite que se empleará para hacer la paella, se fríe el lomo cortado en trozos. Ya frito, se agrega una cucharada de cebolla picada y el tomate, se rehoga todo y se cuece hasta que esté tierno. A continuación se añaden las salchichas, el congrio cortado, los calamares limpios y troceados -sin la tinta-, los langostinos, las almejas y el pollo, cortado en trozos y sin hueso.',
            'user_id' => 1,
            'categoria_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'imagen' => 'receta-upload/AGhDf54twIFXu4w9zFgO0IPKSyV1MyQ4sgYWdLTK.jpg'
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'American Burger (EEUU)',
            'Ingredientes' => 'What is Lorem Ipsum?
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'preparacion' => 'Primero elaboramos la hamburguesa. Para ello mezclamos la carne con el huevo, el ajo muy picado y el perejil. Damos forma a la hamburguesa, la pasamos por el pan rallado y la cocinamos con un poco de aceite. Mientras se hace la carne, partimos por la mitad el pan y le ponemos la lechuga, la cebolla y el tomate. En una sartén freímos el beicon hasta que quede crujiente y lo añadimos al pan. Cuando demos la vuelta a la hamburguesa, le añadimos encima la loncha de queso cheddar para que se funda. Una vez lista, la colocamos encima del resto de ingredientes. Se puede acompañar de kétchup, mayonesa o mostaza.',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'imagen' => 'receta-upload/AGhDf54twIFXu4w9zFgO0IPKSyV1MyQ4sgYWdLTK.jpg'
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Sushi (Japón)',
            'Ingredientes' => 'Una taza de arroz, vinagre de arroz, azúcar, algas nori, wasabi, salsa de soja, cualquier pescado fresco, pepino o aguacate. Es necesaria una esterilla o makisu para hacer los rollos.',
            'preparacion' => 'Primero hay que quitar el almidón al arroz. Para ello lo ponemos en un colador y lo mantenemos bajo el agua del grifo (cuando el almidón haya desaparecido el agua filtrada por el arroz dejará de ser blanquecina y volverá a ser transparente). Ponemos a hervir el arroz durante unos 20 minutos a fuego lento. Cuando esté hecho lo pasamos a una fuente y lo dejamos enfriar. Mientras tanto, preparamos la mezcla para el arroz. En un recipiente ponemos tres cucharadas de vinagre y una de azúcar, y agitamos hasta que este quede casi disuelto. Añadimos esta mezcla al arroz',
            'user_id' => 1,
            'categoria_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'imagen' => 'receta-upload/AGhDf54twIFXu4w9zFgO0IPKSyV1MyQ4sgYWdLTK.jpg'
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Burritos (México)',
            'Ingredientes' => ' 8 tortillas de trigo, 500 gramos de carne picada (vacuno, ave o mezcla), tomate frito, una lechuga, tomates cherry, 1 pimiento verde, 1 pimiento rojo, una cebolla, queso rallado, aceite, pimienta, sazonador de burritos y sal. Opcionalmente se pueden añadir jalapeños, maíz o aguacate.',
            'preparacion' => 'Sazonamos la carne con sal y pimienta y la ponemos a freír con un chorro de aceite de oliva. Cuando esté dorada la carne añadimos el sazonador para burritos, cubrimos con agua y dejamos cocer a fuego lento (15 ó 20 minutos) hasta que se evapore el agua y se cree una especie de crema de carne. A continuación añadimos cinco o seis cucharadas de salsa de tomate. En otra sartén freímos los pimientos en tiras y la cebolla cortada en juliana. Ahora calentamos las tortillas y ponemos una primera capa de lechuga cortada en tiras, una segunda de cebolla y pimientos y dos o tres cucharadas soperas de la carne que hemos cocinado. Añadimos los tomates cherry cortados por la mitad, espolvoreamos todo con queso rallado y solo queda enrollar el burrito y servirlo.',
            'user_id' => 2,
            'categoria_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'imagen' => 'receta-upload/AGhDf54twIFXu4w9zFgO0IPKSyV1MyQ4sgYWdLTK.jpg'
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Pizza (Italia)',
            'Ingredientes' => 'Masa de pizza, 150 gramos de salsa de tomate, 200 gramos de queso mozzarela rallado o en láminas, 50 gramos de nueces picadas, 2 cucharadas de perejil picado, 4 dientes de ajo bien picados, queso rallado, aceite de oliva y sal.',
            'preparacion' => 'Mientras se prepara la pizza, se pone el horno a calentar. En el mortero se prepara un majado con el perejil, el ajo, un chorro de aceite de oliva, sal y pimienta. La base de pizza se cubre con la salsa de tomate y encima se coloca el queso en láminas y rallado, cubriendo bien toda la superficie. Después, se baña con la emulsión preparada en el mortero, se espolvorea con queso rallado y se reparten las nueces picadas. Se mete en el horno a temperatura media durante 20 minutos y se sirve inmediatamente.',
            'user_id' => 2,
            'categoria_id' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'imagen' => 'receta-upload/AGhDf54twIFXu4w9zFgO0IPKSyV1MyQ4sgYWdLTK.jpg'
        ]);
    }
}
