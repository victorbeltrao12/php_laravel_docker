<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'Cliente 1',
                'email' => 'cliente@ficticio.com',
                'endereco' => 'Rua 1',
                'logradouro' => 'Conjunto ficticio 01',
                'cep' => '00000001',
            ]
        );
    }
}
