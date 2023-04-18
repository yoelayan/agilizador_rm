<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Properties extends Migration
{
	public function up()
	{
		$this->forge->addField([
            // ID O CODIGO RM
            'id_Properties' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            // AGENTE CAPTADOR
            'agent' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // TIPO DE ÁREA
            'area_type' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // TIPO DE VIVIENDA
            'housing_type' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // MODELO DE NEGOCIO
            'business_model' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // HABITACIONES
            'bedrooms' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // BAÑOS
            'bathrooms' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // GARAGES
            'garages' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // METROS DE CONSTRUCCIÓN
            'meters_construction' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // METROS DE TERRENO
            'meters_land' => [
                'type' => 'INT',
                'constraint' => '100'
            ],
            // AMBIENTES
            'environments' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // COMODIDADES
            'amenities' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // EXTERIORES
            'exterior' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // ADYACENCIAS
            'adjacencies' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // ESTADO PUBLICITARIO
            'advertising_status' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // TIPO DE MERCADO
            'market_type' => [
                'type' => 'INT',
                'constraint' => '25'
            ],
            // ESTADO TERRITORIAL
            'state' => [
                'type' => 'INT',
                'constraint' => '25'
            ],
            // MUNICIPIO TERRITORIAL
            'municipality' => [
                'type' => 'INT',
                'constraint' => '255'
            ],
            // DIRECCIÓN DEL INMUEBLE
            'address' => [
                'type' => 'INT',
                'constraint' => '255'
            ],
            // PRECIO DEL INMUEBLE
            'price' => [
                'type' => 'INT',
                'constraint' => '255'
            ],
            // NOMBRE & APELLIDO DEL PROPIETARIO
            'owner' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            // CORREO DEL PROPIETARIO
            'owner_mail' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            // TELÉFONO DEL PROPIETARIO
            'owner_phone' => [
                'type' => 'TEXT',
                'constraint' => '25'
            ],
            // ESTADO DE LA PROPIEDAD
            'status' => [
                'type' => 'INT',
                'constraint' => '25'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_Properties', true);
        $this->forge->createTable('Properties');
	}

	public function down()
	{
		$this->forge->dropTable('Properties');
	}
}