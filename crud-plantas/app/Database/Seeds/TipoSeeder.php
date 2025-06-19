<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoSeeder extends Seeder
{
    public function run()
    {
        $tipo = [
            ['nome' => 'Suculentas', 'descricao' => 'Plantas com tecidos especializados em armazenar água, ideais para ambientes internos e de baixa manutenção.'],
            ['nome' => 'Cactos', 'descricao' => 'Plantas espinhosas e resistentes à seca, muito utilizadas em jardins de pedra e interiores.'],
            ['nome' => 'Samambaias', 'descricao' => 'Plantas com folhas longas e recortadas, comuns em vasos suspensos e ambientes úmidos.'],
            ['nome' => 'Orquídeas', 'descricao' => 'Plantas floríferas muito valorizadas pela beleza e variedade de suas flores.'],
            ['nome' => 'Bromélias', 'descricao' => 'Plantas tropicais com folhas dispostas em roseta e flores coloridas.'],
            ['nome' => 'Palmeiras', 'descricao' => 'Plantas de médio a grande porte, usadas em paisagismo e decoração de ambientes abertos e internos.'],
            ['nome' => 'Plantas de sombra', 'descricao' => 'Espécies que se desenvolvem bem com pouca luz solar direta.'],
            ['nome' => 'Plantas de sol pleno', 'descricao' => 'Plantas que exigem luz solar direta durante boa parte do dia para se desenvolverem bem.'],
            ['nome' => 'Trepadeiras', 'descricao' => 'Plantas que crescem apoiadas em suportes, muros ou outras plantas.'],
            ['nome' => 'Arbustos ornamentais', 'descricao' => 'Plantas lenhosas de pequeno a médio porte, ideais para cercas-vivas e divisórias verdes.'],
            ['nome' => 'Árvores ornamentais', 'descricao' => 'Espécies arbóreas cultivadas por sua beleza, flores, folhas ou porte.'],
            ['nome' => 'Herbáceas', 'descricao' => 'Plantas de caule mole e pequeno porte, geralmente usadas em forração.'],
            ['nome' => 'Plantas aquáticas', 'descricao' => 'Plantas que vivem parcial ou totalmente submersas em água, ideais para lagos e aquários.'],
            ['nome' => 'Ervas aromáticas', 'descricao' => 'Plantas que possuem aroma agradável e são usadas em culinária e jardinagem ornamental.'],
            ['nome' => 'Plantas pendentes', 'descricao' => 'Espécies ideais para vasos suspensos, com crescimento caído.'],
            ['nome' => 'Plantas medicinais', 'descricao' => 'Plantas utilizadas tradicionalmente para fins terapêuticos e ornamentais.'],
            ['nome' => 'Plantas nativas', 'descricao' => 'Espécies vegetais originárias da região local, com grande importância ecológica.'],
            ['nome' => 'Plantas exóticas', 'descricao' => 'Espécies introduzidas de outras regiões ou países, frequentemente usadas em decoração.'],
            ['nome' => 'Cercas-vivas', 'descricao' => 'Plantas utilizadas para formar barreiras naturais, tanto ornamentais quanto funcionais.'],
            ['nome' => 'Plantas perenes', 'descricao' => 'Plantas que vivem por vários anos, geralmente florescendo repetidamente.'],
            ['nome' => 'Plantas anuais', 'descricao' => 'Plantas que completam seu ciclo de vida em um único ano.'],
            ['nome' => 'Plantas bianuais', 'descricao' => 'Espécies que precisam de dois anos para completar seu ciclo de vida.'],
            ['nome' => 'Plantas floríferas', 'descricao' => 'Espécies conhecidas pela produção abundante de flores.'],
            ['nome' => 'Plantas de folhagem decorativa', 'descricao' => 'Plantas apreciadas pelas cores, formas e texturas de suas folhas.'],
            ['nome' => 'Plantas variegadas', 'descricao' => 'Plantas com folhas de coloração variada, muito usadas para contraste visual.'],
            ['nome' => 'Gramas ornamentais', 'descricao' => 'Tipos de gramíneas usadas para forração com apelo visual.'],
            ['nome' => 'Pimenteiras ornamentais', 'descricao' => 'Espécies de pimenta cultivadas principalmente pela beleza dos frutos.'],
            ['nome' => 'Cicadáceas', 'descricao' => 'Plantas pré-históricas de aparência semelhante a palmeiras, como a cica.'],
            ['nome' => 'Coníferas ornamentais', 'descricao' => 'Plantas como pinheiros e tuias, usadas em jardins e decorações natalinas.'],
            ['nome' => 'Plantas carnívoras', 'descricao' => 'Plantas que capturam pequenos insetos, como a Dionaea e Nepenthes, usadas em coleções e decoração exótica.'],
        ];

        $this->db->table('tipo')->insertBatch($tipo);
    }
}
