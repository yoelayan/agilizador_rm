<?php

namespace App\Controllers;

use App\Entities\AlertEntity;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\User;

class AuthController extends BaseController
{   
    /*///////////////////////////////////////////////////
    //////////////// VARIABLES PUBLICAS /////////////////
    ///////////////////////////////////////////////////*/


    private $alerts = [];

    
    /*///////////////////////////////////////////////////
    ///////////////////// CONSTRUCTOR ///////////////////
    ///////////////////////////////////////////////////*/
    public function __construct()
    {   
        $this->Permissions = model(Permissions::class);
        $this->UserModel = model(User::class);
        $this->PropertiesModel = model(Properties::class);
        $this->AreaType = model(AreaType::class);
        $this->Housingtype = model(Housingtype::class);
        $this->BusinessModel = model(BusinessModel::class);
        $this->MarketType = model(MarketType::class);
        $this->Municipality = model(Municipality::class);
        $this->Acea = model(Acea::class);
        $this->AceaOptions = model(AceaOptions::class);
        $this->State = model(State::class);
        $this->Status = model(Status::class);
        $this->Roles = model(Roles::class);

        helper('form');
        
        $this->settings = array(
            'title' => '', 
            'slogan' => ' | Asesores RM ¡De la mano contigo!',
            'url' => ''
        );

        $this->navbar = array();

        $this->alerts = [
            'alerts' => [], 
        ];

        $this->body = [];
        
    }



    
    /*///////////////////////////////////////////////////
    //////////////// GENERADOR DE USUARIOS //////////////
    ///////////////////////////////////////////////////*/
	public function generate_user($rol, $request_method)
	{
		$data = Array ( 
			'id_fk_rol' => $rol,
		);

		if ($_SERVER['REQUEST_METHOD'] === $request_method) {
			// loop through all the post variables
			foreach ($_POST as $key => $value) {
				if ($key != 'csrf_test_name') {
					if ($key != 'password') {
						$data[$key] = $value;
					}else{
						$data[$key] = password_hash($value, PASSWORD_DEFAULT);
					}
				}
			}
		}

        $this->UserModel->save($data);

        if ($this->UserModel->db->affectedRows() > 0) {
            $this->setAlert('Success', 'Usuario', '200');
        } else {
            $this->setAlert('Error', 'Usuario', '200');
        }
	}



    
    /*///////////////////////////////////////////////////
    ////////////// GENERADOR DE PROPIEDADES /////////////
    ///////////////////////////////////////////////////*/
	public function generate_propieties($id_agent, $request_method)
	{
		$data = Array ( 
			'agent' => $id_agent,
			'status' => 2,
		);

		if ($_SERVER['REQUEST_METHOD'] === $request_method) {
			// loop through all the post variables
			foreach ($_POST as $key => $value) {
				if ($key != 'csrf_test_name') {
					$data[$key] = $value;
				}
			}
		}

        $this->PropertiesModel->save($data);

        if ($this->PropertiesModel->db->affectedRows() > 0) {
            $this->setAlert('Success', 'Usuario', '200');
        } else {
            $this->setAlert('Error', 'Usuario', '200');
        }
	}






    /*///////////////////////////////////////////////////
    ////////////// DESTRUCTOR DE USUARIOS ///////////////
    ///////////////////////////////////////////////////*/
    public function destroy_user($uri, $document_ci){

        /* ELIMINAMOS AL USUARIOS */
        $this->UserModel->where('document_ci', $document_ci)->delete();

        /* CONSULTA QUERY CI4 */
        $query = $this->UserModel->where('document_ci', $document_ci)->findAll();
        
        /* VERIFICAMOS SI ELIMINAMOS EL USUARIO */
        if (empty($query)) {
            return redirect()->to(base64_decode($uri));
        };
    }






    /*///////////////////////////////////////////////////
    ////////// COMPONENTE GENERADOR DE ALERTS ///////////
    ///////////////////////////////////////////////////*/
    public function setAlert($kind, $model, $status){
        $alert = new AlertEntity($kind, $model, $status);
        array_push($this->alerts['alerts'], $alert);
    }






    /*///////////////////////////////////////////////////
    ////////// COMPONENTE GENERADOR DE TABLAS ///////////
    ///////////////////////////////////////////////////*/
    public function table($model, $title, $description, $header, $prefix, $edit)
    {      
        if ($edit['is_edit']) {
            $is_modal = false;
            if (isset($edit['is_modal'])) {
                $is_modal = $edit['is_modal'];
            }
            for ($i = 0; $i < count($model); $i++) {
                $model[$i]['action'] = [
                    'is_modal' => $is_modal,
                    'button_name' => $edit['button_name'],
                    'url' => $edit['url'],
                    'pk' => $edit['pk'],
                ];
            }
            array_push($header, 'Acción');
        }

        $config = array(
            'title' => $title,
            'description' => $description,  
            'header' => $header, 
            'data' => $model, 
            'prefix' => $prefix, 
        );
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->body["datatable"] = $config;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $url = 'shared/datatable/datatable';
        
        /* CUERPO DE PÁGINA */
        view($url, $this->body);
    }








    /*///////////////////////////////////////////////////
    ///////// COMPONENTE GENERADOR DE MODALFORM /////////
    ///////////////////////////////////////////////////*/
    public function modalForm($urlpost, $title, $prefix, $data)
    {   
        $config = array(
            'urlPost' => $urlpost,
            'title' => $title,
            'prefix' => $prefix,
            'data' => $data,
        );

        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->body["modalform"] = $config;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $url = 'shared/modalform/modalform';
        
        /* CUERPO DE PÁGINA */
        view($url, $this->body);
    }









    /*///////////////////////////////////////////////////
    /////////// EDITOR DE TIPOS DE MERCADOS /////////////
    ///////////////////////////////////////////////////*/
    public function edit_market_type($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar tipo de mercado";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->MarketType->update($id, $data);

            if ($this->MarketType->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["market_type_data"] = $this->MarketType
        ->select('id, name')
        ->where('id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["market_type_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_market_type/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar tipo de mercado';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addMarketType_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/market_type',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: primario',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ////////// EDITOR DE TIPOS DE VIVIENDAS /////////////
    ///////////////////////////////////////////////////*/
    public function edit_housing_type($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar tipo de vivienda";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Housingtype->update($id, $data);

            if ($this->Housingtype->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["housing_type_data"] = $this->Housingtype
        ->select('id, name')
        ->where('id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["housing_type_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_housing_type/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar tipo de vivienda';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addHousingtype_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/housing_type',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: local',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ////////// EDITOR DE MODELOS DE NEGOCIO /////////////
    ///////////////////////////////////////////////////*/
    public function edit_business_model($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar modelo de negocio";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->BusinessModel->update($id, $data);

            if ($this->BusinessModel->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["business_model_data"] = $this->BusinessModel
        ->select('id, name')
        ->where('id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["business_model_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_business_model/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar modelo de negocio';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addBusiness_model_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/business_model',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: venta',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////////// EDITOR DE ESTADOS ///////////////////
    ///////////////////////////////////////////////////*/
    public function edit_state($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar estado";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->State->update($id, $data);

            if ($this->State->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["state_data"] = $this->State
        ->select('id, name')
        ->where('id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["state_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_state/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar A.C.E.A.';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addState_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/state',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: lara',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    //////////// EDITOR DE TIPOS DE AREAS ///////////////
    ///////////////////////////////////////////////////*/
    public function edit_area_type($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar tipo de area";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->AreaType->update($id, $data);

            if ($this->AreaType->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["area_type_data"] = $this->AreaType
        ->select('id, name')
        ->where('id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["area_type_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_area_type/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar tipo de area';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addArea_type_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/area_type',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: comercial',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ////////////// EDITOR DE MUNICIPIOS /////////////////
    ///////////////////////////////////////////////////*/
    public function edit_municipality($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar municipio";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');
            $data["id_fk_state"] = $this->request->getPost('state');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Municipality->update($id, $data);

            if ($this->Municipality->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["municipality_data"] = $this->Municipality
        ->select('municipality.id AS municipality_id, municipality.name AS name, state.name AS state_name, id_fk_state')
        ->join('state', 'state.id = municipality.id_fk_state')
        ->where('municipality.id', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["municipality_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_municipality/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar municipio';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addMunicipio_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/municipality',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: carabobo',
                'type' => 'text',
                'name' => 'name',
            ),
           array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'selected' => 'state_name',
                'type' => 'select',
                'name' => 'state',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ///////////////// EDITOR DE ACEA ////////////////////
    ///////////////////////////////////////////////////*/
    public function edit_acea($id)
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Editar A.C.E.A.";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'shared/form/form_edit';

        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');
            $data["acea"] = $this->request->getPost('acea');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Acea->update($id, $data);

            if ($this->Acea->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

         /* CONSULTA QUERY CI4 */
        $this->body["acea_data"] = $this->Acea
        ->select('acea.id_acea, acea.name, aceaoptions.name AS name_aceaoptions, acea.created_at')
        ->join('aceaoptions', 'aceaoptions.id = acea.acea')
        ->where('id_acea', $id)
        ->findAll()[0];
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["acea_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/component/edit_acea/'.$id;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar A.C.E.A.';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addACEA_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => true,
            'url_previous_page' => '/settings/acea_configuration',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de área',
                'options_model' => $this->AceaOptions->findAll(),
                'selected' => 'name_aceaoptions',
                'type' => 'select',
                'name' => 'acea',
            ),
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: piscina',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }








    /*///////////////////////////////////////////////////
    ///////// COMPONENTE GENERADOR DE FORMULARIOS ///////
    ///////////////////////////////////////////////////*/
    public function generate_form($urlpost, $title, $prefix, $data, $model_form, $controls)
    {  
        $config = array(
            'controls' => $controls,
            'urlPost' => $urlpost,
            'title' => $title,
            'prefix' => $prefix,
            'data' => $data,
            'model_form' => $model_form,
        );

        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->body["generate_form"] = $config;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $url = 'shared/form/form_edit';
        
        /* CUERPO DE PÁGINA */
        view($url, $this->body);
    }









    /*///////////////////////////////////////////////////
    /////// GENERAMOS LA PLANTILLA PARA LA PÁGINA ///////
    ///////////////////////////////////////////////////*/
    public function generate_template($urls)
    {   
        /* VERIFICACIÓN DE PERMISOS */
        $this->check_permission(session()->get('id'));
        
        /* CABECERA DE PÁGINA */
        echo view("template/header/header", $this->settings);

        /* MENÚ SUPERIOR */
        echo view("template/navbar/navbar", $this->navbar);
        
        /* ALERTAS */
        echo view("template/alerts/alerts", $this->alerts);
        
        /* CUERPO DE PÁGINA */
        echo view($urls, $this->body);

        /* PIE DE PÁGINA */
        echo view("template/footer/footer");
    }




    /*///////////////////////////////////////////////////
    //////// CHEQUEAMOS LOS PERMISOS DEL USUARIO ////////
    ///////////////////////////////////////////////////*/
    public function check_permission($user)
    {
        /* ENVIAMOS LA INFORMACIÓN AL MODELO */
        $this->navbar["permissions"] = $this->Permissions
        ->select('pages.name AS page_name, group, route')
        ->join('pages', 'pages.id = permissions.page')
        ->where('user', $user)
        ->findAll();
        
        $response = array();

        foreach ($this->navbar["permissions"] as $key => $value) {
            if ($value['route'] != '') {
                array_push($response, $value['route']);
            }
        }

        if (!in_array($_SERVER['REQUEST_URI'], $response)) {
            //throw new \CodeIgniter\Exceptions\PageNotFoundException('');
        }
    }






    /*///////////////////////////////////////////////////
    //////// COMPONENTE DESTRUCTOR DE ARCHIVOS //////////
    ///////////////////////////////////////////////////*/
    public function destroy_file($directory_file_destroy)
    {
        /* RECIBIMOS LA VARIABLE Y ELIMINAMOS */
        
        if (file_exists(FCPATH.$directory_file_destroy)) {
            unlink(FCPATH.$directory_file_destroy);
            if (!file_exists(FCPATH.$directory_file_destroy)) {
                $this->setAlert('Success', 'Usuario', '200');
            }else{
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

    }






    /*///////////////////////////////////////////////////
    / COMPONENTE GENERADOR DE LA BIBLIOTECA DECLARATIVA /
    ///////////////////////////////////////////////////*/
    public function generate_declarative_library($id_rm){
        $path_prime = FCPATH.'/properties/RM00'.$id_rm;
        $path_graphic = FCPATH.'/properties/RM00'.$id_rm.'/graphic';
        $path_documentary = FCPATH.'/properties/RM00'.$id_rm.'/documentary';

        if (!file_exists($path_prime)) {
            mkdir($path_prime, 0777, true);
            if (file_exists($path_prime)) {
                mkdir($path_graphic, 0777, true);
                if (file_exists($path_graphic)) {
                    mkdir($path_documentary, 0777, true);
                }
            }
        }
    }









    /*///////////////////////////////////////////////////
    /////////// COMPONENTE INSERCIÓN DE FORM ////////////
    ///////////////////////////////////////////////////*/
    public function form_edit($id_rm)
    {   
        /* INICIALIZAMOS LA LISTA PARA EL UPDATE */
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// loop through all the post variables
			foreach ($_POST as $key => $value) {
				if ($key != 'csrf_test_name') {
					if ($key != 'form_edit') {
                        $data[$key] = $value;
                    }
				}
			}
		}

        /* REALIZAMOS EL UPDATE */
        $this->PropertiesModel->update($id_rm, $data);

        /* VERIFICAMOS SI SE CUMPLIÓ LA OPERACIÓN Y EMITIMOS RESPUESTA */
        if ($this->PropertiesModel->db->affectedRows() > 0) {
            $this->setAlert('Success', 'Usuario', '200');
        } else {
            $this->setAlert('Error', 'Usuario', '200');
        }
    }









    /*///////////////////////////////////////////////////
    ///////// COMPONENTE INSERCIÓN DE A.C.E.A. //////////
    ///////////////////////////////////////////////////*/
    public function insert_acea($id_rm)
    {   
        /* INICIALIZAMOS LA LISTA PARA EL UPDATE */
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// loop through all the post variables
			foreach ($_POST as $key => $value) {
				if ($key != 'csrf_test_name') {
					$data[$key] = implode(',', $value);
				}
			}
		}

        /* REALIZAMOS EL UPDATE */
        $this->PropertiesModel->update($id_rm, $data);

        /* VERIFICAMOS SI SE CUMPLIÓ LA OPERACIÓN Y EMITIMOS RESPUESTA */
        if ($this->PropertiesModel->db->affectedRows() > 0) {
            $this->setAlert('Success', 'Usuario', '200');
        } else {
            $this->setAlert('Error', 'Usuario', '200');
        }
    }












    /*///////////////////////////////////////////////////
    //////// COMPONENTE GENERADOR DE CATALOGOS //////////
    ///////////////////////////////////////////////////*/
    public function dataCatalogue($model, $perPage)
    {
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
        /* ASIGNAMOS VALORES AL BODY PARA EL DATACATALOGUE */
        $this->body['data_catalogue'] = $model->paginate(10);

        $this->body['pager'] = $model->pager;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $url = 'shared/datacatalogue/datacatalogue';
        
        /* CUERPO DE PÁGINA */
        view($url, $this->body);
    }









    /*///////////////////////////////////////////////////
    /// COMPONENTE MANIPULADOR DE GRÁFICOS EN SUBIDA ////
    ///////////////////////////////////////////////////*/
    public function uploadDocumentaryManipulator($upload, $url_folder){
        if ($upload->isValid() && !$upload->hasMoved())
        {   
            $newName = $upload->getClientName();
            $upload->move($url_folder, $newName);
            if (is_file($url_folder.$newName)) {
                $this->setAlert('Success', 'Usuario', '200');
            }
        }
        else
        {
            $this->setAlert('Error', 'Usuario', '200');
        }
    }






    /*///////////////////////////////////////////////////
    /// COMPONENTE MANIPULADOR DE GRÁFICOS EN SUBIDA ////
    ///////////////////////////////////////////////////*/
    public function uploadGraphicsManipulator($upload, $url_folder){
        if ($upload->isValid() && !$upload->hasMoved())
        {   
            if ($url_folder) {
                // Use scandir() to get the files in the directory
                $files = scandir($url_folder);

                // Filter out the current and parent directory links
                $files = array_filter($files, function ($file) {
                    return !in_array($file, ['.', '..']);
                });

                // Count the remaining files
                $count = count($files) + 1;

                if (strlen(strval($count)) == 1) {
                    $newName = '0'.$count.'.'.$upload->getExtension();
                } else {
                    $newName = $count.'.'.$upload->getExtension();
                }
            }

            $upload->move($url_folder, $newName);

            $helper = \Config\Services::image();
            $origen = $url_folder.$newName; // Ruta de la imagen
            $destino = $url_folder.$newName; // Ruta para guardar la imagen comprimida
            $max_width = 1080; // Ancho máximo permitido
            $quality = 60; // Calidad de compresión

            // Cargar la imagen y obtener sus dimensiones
            $image = $helper->withFile($origen);
            $width = $image->getWidth();
            $height = $image->getHeight();

            // Redimensionar la imagen si es necesario
            if ($width > $max_width) {
                $image->resize($max_width, $height, true);
            }

            // Comprimir la imagen y guardarla
            $image->save($destino, $quality);

            if (is_file($destino)) {
                $this->setAlert('Success', 'Usuario', '200');
            }
        }
        else
        {
            $this->setAlert('Error', 'Usuario', '200');
        }
    }









    /*///////////////////////////////////////////////////
    /////// GENERAMOS LA PLANTILLA PARA LA PÁGINA ///////
    ///////////////////////////////////////////////////*/
    public function is_method_get()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }




    /*///////////////////////////////////////////////////
    ////////////////// PÁGINA "PANEL" ///////////////////
    ///////////////////////////////////////////////////*/
    public function dashboard()
    {
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Panel";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/dashboard/dashboard';
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/properties/my_properties';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Declarar captación';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addProperties_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de área',
                'options_model' => $this->AreaType->findAll(),
                'type' => 'select',
                'name' => 'area_type',
            ),
            array(
                'label' => 'Tipo de vivienda',
                'options_model' => $this->Housingtype->findAll(),
                'type' => 'select',
                'name' => 'housing_type',
            ),
            array(
                'label' => 'Modelo de negocio',
                'options_model' => $this->BusinessModel->findAll(),
                'type' => 'select',
                'name' => 'business_model',
            ),
            array(
                'label' => 'Tipo de mercado',
                'options_model' => $this->MarketType->findAll(),
                'type' => 'select',
                'name' => 'market_type',
            ),
            array(
                'label' => 'Habitaciones',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bedrooms',
            ),
            array(
                'label' => 'Baños',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bathrooms',
            ),
            array(
                'label' => 'Puestos de estacionamiento',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'garages',
            ),
            array(
                'label' => 'Construcción m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_construction',
            ),
            array(
                'label' => 'Terreno m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_land',
            ),
            array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'type' => 'select',
                'name' => 'state',
            ),
            array(
                'label' => 'Municipio',
                'options_model' => $this->Municipality->findAll(),
                'type' => 'select',
                'name' => 'municipality',
            ),
            array(
                'label' => 'Dirección',
                'placeholder' => 'Ej: Av. San Martin',
                'type' => 'text',
                'name' => 'address',
            ),
            array(
                'label' => 'Precio',
                'placeholder' => '000000',
                'type' => 'number',
                'name' => 'price',
            ),
            array(
                'label' => 'Propietario',
                'placeholder' => 'Nombre & apellido',
                'type' => 'text',
                'name' => 'owner',
            ),
            array(
                'label' => 'Correo del propietario',
                'placeholder' => 'propietario@uncorreo.com',
                'type' => 'text',
                'name' => 'owner_mail',
            ),
            array(
                'label' => 'Teléfono del propietario',
                'placeholder' => '0000000000',
                'type' => 'text',
                'name' => 'owner_phone',
            ),
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////////// PÁGINA "CAPTACIONES" ////////////////
    ///////////////////////////////////////////////////*/
    public function statements()
    {
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Declaraciones";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/statements';
        
        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Declaraciones';

        /* DESCRIPCION DE TABLA */
        $description = 'Gestiona las propiedades declaradas por los agentes, manipula y observa de cerca cada una de las captaciones.';

        /* CABEZA DE TABLA */
        $header = ['RM', 'Tipo de propiedad', 'Dirección', 'Modelo de negocio', 'Estatus', 'Fecha C.'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'user_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/statements/properties/views/',
            'pk' => 'id_properties',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->PropertiesModel
        ->select('id_properties, housingtype.name, properties.address, businessmodel.name AS business_model, status.name AS status, properties.created_at')
        ->join('housingtype', 'housingtype.id = properties.housing_type')
        ->join('businessmodel', 'businessmodel.id = properties.business_model')
        ->join('status', 'status.id = properties.status')
        ->findAll();

        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////////// PÁGINA "SUPERUSUARIOS" //////////////
    ///////////////////////////////////////////////////*/
    public function super_users()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Superusuarios";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/users/super_users';
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/users/super_users';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear superusuario';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addSuperUser_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre y apellido',
                'placeholder' => 'Ej: Carlos duarte',
                'type' => 'text',
                'name' => 'full_name',
            ),
            array(
                'label' => 'Telefono',
                'placeholder' => 'Ej: +00 000-00-00-000',
                'type' => 'number',
                'name' => 'phone',
            ),
            array(
                'label' => 'Cédula',
                'placeholder' => 'Ej: 00000000',
                'type' => 'text',
                'name' => 'document_ci',
            ),
            array(
                'label' => 'Correo electrónico',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'email',
                'name' => 'email',
            ),
            array(
                'label' => 'Contraseña',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'text',
                'name' => 'password',
            ),
        ];
        
        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        if (!$this->is_method_get()) {
            $mthod = 'POST';
            $user_rol = 2;
    
            /* GENERAMOS EL USUARIO */
            $this->generate_user($user_rol, $mthod);
        }
        
        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Superusuarios';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra Superusuarios, los mismos tienen altos privilegios, en acciones de edición y visualización de datos.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre y apellido', 'Teléfono', 'Cédula', 'Correo'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'su_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/users/edit_user/'.base64_encode($urlpost).'/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->UserModel->select('id, full_name, phone, document_ci, email')->where('id_fk_rol', 2)->findAll();

        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ////////////// PÁGINA "ADMINISTRATIVOS" /////////////
    ///////////////////////////////////////////////////*/
    public function administrative_users()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Administrativos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/users/administratives';
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/users/administratives';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear administrativo';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addAdministrative_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre y apellido',
                'placeholder' => 'Ej: Carlos duarte',
                'type' => 'text',
                'name' => 'full_name',
            ),
            array(
                'label' => 'Telefono',
                'placeholder' => 'Ej: +00 000-00-00-000',
                'type' => 'number',
                'name' => 'phone',
            ),
            array(
                'label' => 'Cédula',
                'placeholder' => 'Ej: 00000000',
                'type' => 'text',
                'name' => 'document_ci',
            ),
            array(
                'label' => 'Correo electrónico',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'email',
                'name' => 'email',
            ),
            array(
                'label' => 'Contraseña',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'text',
                'name' => 'password',
            ),
        ];
        
        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        if (!$this->is_method_get()) {
            $mthod = 'POST';
            $user_rol = 3;
    
            /* GENERAMOS EL USUARIO */
            $this->generate_user($user_rol, $mthod);
        }
        
        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Administrativos';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra Administativos, son constructores de la información de la plataforma.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre y apellido', 'Teléfono', 'Cédula', 'Correo'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'administrative_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/users/edit_user/'.base64_encode($urlpost).'/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->UserModel->select('id, full_name, phone, document_ci, email')->where('id_fk_rol', 3)->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ///////////////// PÁGINA "AGENTES" //////////////////
    ///////////////////////////////////////////////////*/
    public function agents_users()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Ejecutivos de ventas";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/users/agents';
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/users/agents';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear ejecutivo de ventas';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addAgents_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre y apellido',
                'placeholder' => 'Ej: Carlos duarte',
                'type' => 'text',
                'name' => 'full_name',
            ),
            array(
                'label' => 'Telefono',
                'placeholder' => 'Ej: +00 000-00-00-000',
                'type' => 'number',
                'name' => 'phone',
            ),
            array(
                'label' => 'Cédula',
                'placeholder' => 'Ej: 00000000',
                'type' => 'text',
                'name' => 'document_ci',
            ),
            array(
                'label' => 'Correo electrónico',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'email',
                'name' => 'email',
            ),
            array(
                'label' => 'Contraseña',
                'placeholder' => 'Ej: usuario@tuasesorrm.com.ve',
                'type' => 'text',
                'name' => 'password',
            ),
        ];
        
        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        if (!$this->is_method_get()) {
            $mthod = 'POST';
            $user_rol = 1;
    
            /* GENERAMOS EL USUARIO */
            $this->generate_user($user_rol, $mthod);
        }
        
        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Ejecutivos de ventas';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra Ejecutivos de ventas, generan el flujo y modelo de negocio en la inmobiliaria.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre y apellido', 'Teléfono', 'Cédula', 'Correo'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'administrative_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/users/edit_user/'.base64_encode($urlpost).'/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->UserModel->select('id, full_name, phone, document_ci, email')->where('id_fk_rol', 1)->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////////// PÁGINA "SUPERUSUARIOS" //////////////
    ///////////////////////////////////////////////////*/
    public function edit_user($uri, $id)
    {  
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "U00".$id;
                
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/users/edit_user';
                
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["previous_page"] = base64_decode($uri);

        /* CONSULTA QUERY CI4 */
        $query = $this->UserModel
        ->join('roles', 'roles.id = users.id_fk_rol')
        ->where('users.id', $id)
        ->findAll();
        
        /* VERIFICAMOS SI TENEMOS RESULTADO */
        if (!empty($query)) {
            $this->body['user'] = $query[0];
        }else{
            return redirect()->to(base_url($this->settings["previous_page"]));
        }
        
        $this->body['id_user'] = $id;
        $this->body['roles_data'] = $this->Roles->findAll();

        if (!$this->is_method_get()) {

            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            if ($this->request->getPost('confirm-password')) {
                $data["password"] = password_hash($this->request->getPost('confirm-password'), PASSWORD_DEFAULT);
            }else{
                $data["full_name"] = $this->request->getPost('full_name');
                $data["phone"] = $this->request->getPost('phone');
                $data["document_ci"] = $this->request->getPost('document_ci');
                $data["email"] = $this->request->getPost('email');
                $data["id_fk_rol"] = $this->request->getPost('id_fk_rol');
            }
            

            

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->UserModel->update($id, $data);

            if ($this->UserModel->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
                return redirect()->to(base_url('/users/edit_user/'.$uri.'/'.$id));
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]); 
    }









    /*///////////////////////////////////////////////////
    ////////////// PÁGINA "MIS PROPIEDADES" /////////////
    ///////////////////////////////////////////////////*/
    public function my_properties()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Propiedades";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/properties/my_properties';
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/properties/my_properties';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Declarar captación';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addProperties_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de área',
                'options_model' => $this->AreaType->findAll(),
                'type' => 'select',
                'name' => 'area_type',
            ),
            array(
                'label' => 'Tipo de vivienda',
                'options_model' => $this->Housingtype->findAll(),
                'type' => 'select',
                'name' => 'housing_type',
            ),
            array(
                'label' => 'Modelo de negocio',
                'options_model' => $this->BusinessModel->findAll(),
                'type' => 'select',
                'name' => 'business_model',
            ),
            array(
                'label' => 'Tipo de mercado',
                'options_model' => $this->MarketType->findAll(),
                'type' => 'select',
                'name' => 'market_type',
            ),
            array(
                'label' => 'Habitaciones',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bedrooms',
            ),
            array(
                'label' => 'Baños',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bathrooms',
            ),
            array(
                'label' => 'Puestos de estacionamiento',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'garages',
            ),
            array(
                'label' => 'Construcción m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_construction',
            ),
            array(
                'label' => 'Terreno m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_land',
            ),
            array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'type' => 'select',
                'name' => 'state',
            ),
            array(
                'label' => 'Municipio',
                'options_model' => $this->Municipality->findAll(),
                'type' => 'select',
                'name' => 'municipality',
            ),
            array(
                'label' => 'Dirección',
                'placeholder' => 'Ej: Av. San Martin',
                'type' => 'text',
                'name' => 'address',
            ),
            array(
                'label' => 'Precio',
                'placeholder' => '000000',
                'type' => 'number',
                'name' => 'price',
            ),
            array(
                'label' => 'Propietario',
                'placeholder' => 'Nombre & apellido',
                'type' => 'text',
                'name' => 'owner',
            ),
            array(
                'label' => 'Correo del propietario',
                'placeholder' => 'propietario@uncorreo.com',
                'type' => 'text',
                'name' => 'owner_mail',
            ),
            array(
                'label' => 'Teléfono del propietario',
                'placeholder' => '0000000000',
                'type' => 'text',
                'name' => 'owner_phone',
            ),
        ];
        
        if (!$this->is_method_get()) {
            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->generate_propieties(session()->get('id'), 'POST');
        }

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);
        
        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Mis propiedades';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra tus captaciones, gestiona tus inmueble de manera profesional.';

        /* CABEZA DE TABLA */
        $header = ['RM', 'Tipo de propiedad', 'Dirección', 'Modelo de negocio', 'Estatus', 'Fecha C.'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'pr_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/properties/my_properties/views/',
            'pk' => 'id_properties',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->PropertiesModel
        ->select('id_properties, housingtype.name, properties.address, businessmodel.name AS business_model, status.name AS status, properties.created_at')
        ->join('housingtype', 'housingtype.id = properties.housing_type')
        ->join('businessmodel', 'businessmodel.id = properties.business_model')
        ->join('status', 'status.id = properties.status')
        ->where('agent', session()->get('id'))
        ->findAll();

        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }




    /*///////////////////////////////////////////////////
    ////////////// PÁGINA "MI PROPIEDAD" ////////////////
    ///////////////////////////////////////////////////*/
    public function my_properties_views($rm)
    {
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "RM00".$rm;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/properties/my_properties/views';

        /* DECLARAMOS EL CODIGO RM00 */
        $this->body["code_rm"] = "RM00".$rm;
        
        /* GENERAMOS LA BIBLIOTECA DECLARATIVA DE NO TENERLA */
        $this->generate_declarative_library($rm);


        if (!$this->is_method_get()) {


            if ($this->request->getFile('graphic')) {
                $url_folder = FCPATH.'properties/RM00'.$rm.'/graphic/';
                $this->uploadGraphicsManipulator($this->request->getFile('graphic'), $url_folder);
            }
            elseif ($this->request->getFile('documentary')) {
                $url_folder = FCPATH.'properties/RM00'.$rm.'/documentary/';
                $this->uploadDocumentaryManipulator($this->request->getFile('documentary'), $url_folder);
            }
            elseif($this->request->getPost('destroy_file')){
                $this->destroy_file($this->request->getPost('destroy_file'));
            }
            elseif($this->request->getPost('form_edit')){
                $this->form_edit($rm);
            }
            else{
                $this->insert_acea($rm);
            }
        }

        helper('url');
        helper('filesystem');

        $dir_graphic = FCPATH.'properties/RM00'.$rm.'/graphic/';
        $dir_documentary = FCPATH.'properties/RM00'.$rm.'/documentary/';

        $files_graphic = directory_map($dir_graphic);
        $files_documentary = directory_map($dir_documentary);

        /* ASIGNAMOS VALORES A LOS RESPECTIVOS GESTORES */
        $this->body["graphics"] = $files_graphic; 
        $this->body["documentarys"] = $files_documentary;
        $this->body["aceas"] = $this->Acea->findAll();
        $this->body["property_data"] = $this->PropertiesModel
        ->select('properties.meters_land, MarketType.name AS markettype_name, businessmodel.name AS businessmodel_name, areatype.name AS area_type_name, properties.owner_phone, properties.owner_mail, properties.owner, status.name AS status_name, properties.created_at, properties.garages, properties.bathrooms, properties.bedrooms, municipality.name AS municipality_name, state.name AS state_name, properties.meters_construction, properties.address, properties.id_properties, housingtype.name AS housingtype_name, users.full_name AS name_agent, properties.environments, properties.amenities, properties.exterior, properties.adjacencies, properties.price')
        ->join('housingtype', 'housingtype.id = properties.housing_type')
        ->join('municipality ', 'municipality.id = properties.municipality')
        ->join('state ', 'state.id = properties.state')
        ->join('users', 'users.id = properties.agent')
        ->join('areatype ', 'areatype.id = properties.area_type')
        ->join('businessmodel ', 'businessmodel.id = properties.business_model')
        ->join('MarketType ', 'MarketType.id = properties.market_type')
        ->join('status', 'status.id = properties.status')
        ->where('id_properties', $rm)
        ->findAll()[0];
        
        
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["property_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/properties/my_properties/views/'.$rm;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar propiedad';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addProperties_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => false,
            'url_previous_page' => '',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de área',
                'options_model' => $this->AreaType->findAll(),
                'selected' => 'area_type_name',
                'type' => 'select',
                'name' => 'area_type',
            ),
            array(
                'label' => 'Tipo de vivienda',
                'options_model' => $this->Housingtype->findAll(),
                'selected' => 'housingtype_name',
                'type' => 'select',
                'name' => 'housing_type',
            ),
            array(
                'label' => 'Modelo de negocio',
                'options_model' => $this->BusinessModel->findAll(),
                'selected' => 'businessmodel_name',
                'type' => 'select',
                'name' => 'business_model',
            ),
            array(
                'label' => 'Tipo de mercado',
                'options_model' => $this->MarketType->findAll(),
                'selected' => 'markettype_name',
                'type' => 'select',
                'name' => 'market_type',
            ),
            array(
                'label' => 'Habitaciones',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bedrooms',
            ),
            array(
                'label' => 'Baños',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bathrooms',
            ),
            array(
                'label' => 'Puestos de estacionamiento',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'garages',
            ),
            array(
                'label' => 'Construcción m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_construction',
            ),
            array(
                'label' => 'Terreno m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_land',
            ),
            array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'selected' => 'state_name',
                'type' => 'select',
                'name' => 'state',
            ),
            array(
                'label' => 'Municipio',
                'options_model' => $this->Municipality->findAll(),
                'selected' => 'municipality_name',
                'type' => 'select',
                'name' => 'municipality',
            ),
            array(
                'label' => 'Dirección',
                'placeholder' => 'Ej: Av. San Martin',
                'type' => 'text',
                'name' => 'address',
            ),
            array(
                'label' => 'Precio',
                'placeholder' => '000000',
                'type' => 'number',
                'name' => 'price',
            ),
            array(
                'label' => 'Propietario',
                'placeholder' => 'Nombre & apellido',
                'type' => 'text',
                'name' => 'owner',
            ),
            array(
                'label' => 'Correo del propietario',
                'placeholder' => 'propietario@uncorreo.com',
                'type' => 'text',
                'name' => 'owner_mail',
            ),
            array(
                'label' => 'Teléfono del propietario',
                'placeholder' => '0000000000',
                'type' => 'text',
                'name' => 'owner_phone',
            ),
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }






    /*///////////////////////////////////////////////////
    /////////// PAGINA CONFIGURACION A.C.E.A. ///////////
    ///////////////////////////////////////////////////*/
    public function acea_configuration(){
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "A.C.E.A.";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/acea_configuration';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');
            $data["acea"] = $this->request->getPost('acea');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Acea->save($data);

            if ($this->Acea->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }

        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/acea_configuration';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear A.C.E.A.';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addProperties_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de A.C.E.A.',
                'options_model' => $this->AceaOptions->findAll(),
                'type' => 'select',
                'name' => 'acea',
            ),
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: parque infantil',
                'type' => 'text',
                'name' => 'name',
            ),
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);
        
         /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Configurador de A.C.E.A.';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra el motor informativo A.C.E.A, gestiona tus inmueble de manera profesional.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre', 'ACEA', 'Fecha C.'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'acea_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'is_modal' => false,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_acea/',
            'pk' => 'id_acea',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->Acea
        ->select('acea.id_acea, acea.name, aceaoptions.name AS name_aceaoptions, acea.created_at')
        ->join('aceaoptions', 'aceaoptions.id = acea.acea')
        ->findAll();

        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }






    /*///////////////////////////////////////////////////
    /////////////// PAGINA DE PROPIEDADES ///////////////
    ///////////////////////////////////////////////////*/
    public function properties(){
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Propiedades";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/properties/properties';
        
        $model = $this->PropertiesModel 
        ->select('properties.meters_land, MarketType.name AS markettype_name, businessmodel.name AS businessmodel_name, areatype.name AS area_type_name, status.name AS status_name, properties.created_at, properties.garages, properties.bathrooms, properties.bedrooms, municipality.name AS municipality_name, state.name AS state_name, properties.meters_construction, properties.address, properties.id_properties, housingtype.name AS housingtype_name, users.full_name AS name_agent, properties.environments, properties.amenities, properties.exterior, properties.adjacencies, properties.price')
        ->join('housingtype', 'housingtype.id = properties.housing_type')
        ->join('municipality ', 'municipality.id = properties.municipality')
        ->join('state ', 'state.id = properties.state')
        ->join('users', 'users.id = properties.agent')
        ->join('areatype ', 'areatype.id = properties.area_type')
        ->join('businessmodel ', 'businessmodel.id = properties.business_model')
        ->join('MarketType ', 'MarketType.id = properties.market_type')
        ->join('status', 'status.id = properties.status')
        ->where('status.name', 'Aprobado');

        $this->dataCatalogue($model, 10);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);

    }






    /*///////////////////////////////////////////////////
    //////////// PAGINA DETALLE DE PROPIEDAD ////////////
    ///////////////////////////////////////////////////*/
    public function view_property($id_property){

    /* TÍTULO Y SLOGAN DE PÁGINA */
    $this->settings["title"] = "RM00".$id_property;
        
    /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
    $this->settings["url"] = 'auth/properties/properties/view_property';
    
    /* REALIZAMOS LA CONSULTA Y OBTENEMOS LA PROPIEDAD */
    $model = $this->PropertiesModel
    ->select('users.phone AS phone_agent, users.profile_photo AS profile_photo_agent, users.email AS email_agent, properties.meters_land, MarketType.name AS markettype_name, businessmodel.name AS businessmodel_name, areatype.name AS area_type_name, status.name AS status_name, properties.created_at, properties.garages, properties.bathrooms, properties.bedrooms, municipality.name AS municipality_name, state.name AS state_name, properties.meters_construction, properties.address, properties.id_properties, housingtype.name AS housingtype_name, users.full_name AS name_agent, properties.environments AS environments, properties.amenities, properties.exterior, properties.adjacencies, properties.price')
    ->join('housingtype', 'housingtype.id = properties.housing_type')
    ->join('municipality ', 'municipality.id = properties.municipality')
    ->join('state ', 'state.id = properties.state')
    ->join('users', 'users.id = properties.agent')
    ->join('areatype ', 'areatype.id = properties.area_type')
    ->join('businessmodel ', 'businessmodel.id = properties.business_model')
    ->join('MarketType ', 'MarketType.id = properties.market_type')
    ->join('status', 'status.id = properties.status')
    ->where('status.name', 'Aprobado')
    ->where('properties.id_properties', $id_property)
    ->findAll();

    /* ASIGNAMOS INFORMACION PARA EL BODY */
    $this->body["id_property"] = $id_property;
    $this->body["aceas"] = $this->Acea->findAll();
    
    /* ASIGNAMOS INFORMACION PARA EL BODY */
    $this->body["property_data"] = $model[0];
    
    /* GENERAMOS NUESTRA PÁGINA */
    $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////////// PÁGINA "TIPO ÁREA" //////////////////
    ///////////////////////////////////////////////////*/
    public function area_type()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/area_type';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->AreaType->save($data);

            if ($this->AreaType->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/area_type';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear tipo de área';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addAreaType_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: comercial',
                'type' => 'text',
                'name' => 'name',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Tipo de área';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los Tipos de áreas, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'area_type_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_area_type/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->AreaType->select('id, name')->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ///////////// PÁGINA "TIPO VIVIENDA" ////////////////
    ///////////////////////////////////////////////////*/
    public function housing_type()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/housing_type';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Housingtype->save($data);

            if ($this->Housingtype->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/housing_type';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear tipo de vivienda';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addHousingtype_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: comercial',
                'type' => 'text',
                'name' => 'name',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Tipo de vivienda';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los Tipos de viviendas, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'housing_type_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_housing_type/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->Housingtype->select('id, name')->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    /////////// PÁGINA "MODELO DE NEGOCIO" //////////////
    ///////////////////////////////////////////////////*/
    public function business_model()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/business_model';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->BusinessModel->save($data);

            if ($this->BusinessModel->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/business_model';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear modelo de negocio';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addBusinessModel_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: alquiler',
                'type' => 'text',
                'name' => 'name',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Modelo de negocios';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los Modelos de negocios, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'business_model_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_business_model/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->BusinessModel->select('id, name')->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    //////////// PÁGINA "TIPO DE MERCADO" ///////////////
    ///////////////////////////////////////////////////*/
    public function market_type()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/market_type';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->MarketType->save($data);

            if ($this->MarketType->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/market_type';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear tipo de mercado';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addMarketType_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: primario',
                'type' => 'text',
                'name' => 'name',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Tipo de mercado';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los Tipos de mercado, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Nombre'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'market_type_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_market_type/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->MarketType->select('id, name')->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    //////////////// PÁGINA "ESTADOS" ///////////////////
    ///////////////////////////////////////////////////*/
    public function state()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/state';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->State->save($data);

            if ($this->State->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/state';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear estado';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addState_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: carabobo',
                'type' => 'text',
                'name' => 'name',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Estados';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los estados de Venezuela, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Estado'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'state_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_state/',
            'pk' => 'id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->State->select('id, name')->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }









    /*///////////////////////////////////////////////////
    ////////////// PÁGINA "MUNICIPIOS" ///////////////////
    ///////////////////////////////////////////////////*/
    public function municipality()
    {   
        
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "Configuración de campos";
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/settings/municipality';
        
        if (!$this->is_method_get()) {
            /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
            $data = [];

            /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
            $data["name"] = $this->request->getPost('name');
            $data["id_fk_state"] = $this->request->getPost('id_fk_state');

            /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
            $this->Municipality->save($data);

            if ($this->Municipality->db->affectedRows() > 0) {
                $this->setAlert('Success', 'Usuario', '200');
            } else {
                $this->setAlert('Error', 'Usuario', '200');
            }
        }
        
        /* USAREMOS EL COMPONENTE MODALFORM */
        
        /* RUTA PARA SUBMIT */
        $urlpost = '/settings/municipality';
        
        /* TITULO PARA EL MODALFORM */
        $title = 'Crear estado';
        
        /* PREFIJO PARA EL MODALFORM */
        $prefix = 'addmunicipality_modalform';
        
        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Nombre',
                'placeholder' => 'Ej: carabobo',
                'type' => 'text',
                'name' => 'name',
            ),
            array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'type' => 'select',
                'name' => 'id_fk_state',
            )
        ];

        /* GENERAMOS NUESTRO MODALFORM */
        $this->modalForm($urlpost, $title, $prefix, $data);

        /* USAREMOS EL COMPONENTE DATATABLE */

        /* TITULO DE TABLA */
        $title = 'Municipios';

        /* DESCRIPCION DE TABLA */
        $description = 'La siguiente tabla muestra los municipios de cada estado, esta configuración sirve para apoyar a la recolecta de información una vez declarando el inmueble.';

        /* CABEZA DE TABLA */
        $header = ['ID', 'Municipio', 'Estado'];

        /* PREFIJO PARA LA TABLA */
        $prefix = 'municipality_';

        /* CONFIGURACION PARA EDITAR REGISTROS */
        $edit = [
            'is_edit' => true,
            'button_name' => 'Gestionar',
            'url' => '/component/edit_municipality/',
            'pk' => 'municipality_id',
        ];

        /* CONSULTA QUERY CI4 */
        $query = $this->Municipality
        ->select('municipality.id AS municipality_id, municipality.name AS municipality_name, state.name AS state_name')
        ->join('state', 'state.id = municipality.id_fk_state')
        ->findAll();
        
        /* GENERAMOS NUESTRO DATATABLE */
        $this->table($query, $title, $description, $header, $prefix, $edit);

        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }




    /*///////////////////////////////////////////////////
    ////////////// PÁGINA "MI PROPIEDAD" ////////////////
    ///////////////////////////////////////////////////*/
    public function statements_properties_views($rm)
    {
        /* TÍTULO Y SLOGAN DE PÁGINA */
        $this->settings["title"] = "RM00".$rm;
        
        /* ASIGNAMOS LA URL PARA ACCEDER A LA PÁGINA */
        $this->settings["url"] = 'auth/catchment_department/statements_properties_views/views';

        /* DECLARAMOS EL CODIGO RM00 */
        $this->body["code_rm"] = "RM00".$rm;
        
        /* GENERAMOS LA BIBLIOTECA DECLARATIVA DE NO TENERLA */
        $this->generate_declarative_library($rm);


        if (!$this->is_method_get()) {


            if ($this->request->getFile('graphic')) {
                $url_folder = FCPATH.'properties/RM00'.$rm.'/graphic/';
                $this->uploadGraphicsManipulator($this->request->getFile('graphic'), $url_folder);
            }
            elseif ($this->request->getFile('documentary')) {
                $url_folder = FCPATH.'properties/RM00'.$rm.'/documentary/';
                $this->uploadDocumentaryManipulator($this->request->getFile('documentary'), $url_folder);
            }
            elseif($this->request->getPost('destroy_file')){
                $this->destroy_file($this->request->getPost('destroy_file'));
            }
            elseif($this->request->getPost('form_edit')){
                $this->form_edit($rm);
            }
            elseif($this->request->getPost('status')){
                /* INCIALIZAMOS EL ARREGLO PARA LA INSERCION*/
                $data = [];

                /* RECIBIMOS LAS VARIABLES DE FORMULARIO */
                $data["status"] = $this->request->getPost('status');

                /* SI LA INSERCIÓN ES CORRECTA RETORNAME A LA PÁGINA */
                $this->MarketType->update($rm, $data);

                if ($this->MarketType->db->affectedRows() > 0) {
                    $this->setAlert('Success', 'Usuario', '200');
                } else {
                    $this->setAlert('Error', 'Usuario', '200');
                }
            }
            else{
                $this->insert_acea($rm);
            }
        }

        helper('url');
        helper('filesystem');

        $dir_graphic = FCPATH.'properties/RM00'.$rm.'/graphic/';
        $dir_documentary = FCPATH.'properties/RM00'.$rm.'/documentary/';

        $files_graphic = directory_map($dir_graphic);
        $files_documentary = directory_map($dir_documentary);

        /* ASIGNAMOS VALORES A LOS RESPECTIVOS GESTORES */
        $this->body["graphics"] = $files_graphic; 
        $this->body["documentarys"] = $files_documentary;
        $this->body["aceas"] = $this->Acea->findAll();
        $this->body["status"] = $this->Status->findAll();
        $this->body["property_data"] = $this->PropertiesModel
        ->select('properties.meters_land, MarketType.name AS markettype_name, businessmodel.name AS businessmodel_name, areatype.name AS area_type_name, properties.owner_phone, properties.owner_mail, properties.owner, status.name AS status_name, properties.created_at, properties.garages, properties.bathrooms, properties.bedrooms, municipality.name AS municipality_name, state.name AS state_name, properties.meters_construction, properties.address, properties.id_properties, housingtype.name AS housingtype_name, users.full_name AS name_agent, properties.environments, properties.amenities, properties.exterior, properties.adjacencies, properties.price')
        ->join('housingtype', 'housingtype.id = properties.housing_type')
        ->join('municipality ', 'municipality.id = properties.municipality')
        ->join('state ', 'state.id = properties.state')
        ->join('users', 'users.id = properties.agent')
        ->join('areatype ', 'areatype.id = properties.area_type')
        ->join('businessmodel ', 'businessmodel.id = properties.business_model')
        ->join('MarketType ', 'MarketType.id = properties.market_type')
        ->join('status', 'status.id = properties.status')
        ->where('id_properties', $rm)
        ->findAll()[0];
        
        
        
        /* USAREMOS EL COMPONENTE FORM */
        
        /* MODELO PARA EL COMPONENTE FORM */
        $model_form = $this->body["property_data"];

        /* RUTA PARA SUBMIT */
        $urlpost = '/properties/my_properties/views/'.$rm;
        
        /* TITULO PARA EL FORM */
        $title = 'Editar propiedad';
        
        /* PREFIJO PARA EL FORM */
        $prefix = 'addProperties_form';
        
        /* CONTROLES DE NAVEGACIÓN PARA EL FORM */
        $controls = [
            'is_controls' => false,
            'url_previous_page' => '',
        ];

        /* FORMULARIO */
        $data = [
            array(
                'label' => 'Tipo de área',
                'options_model' => $this->AreaType->findAll(),
                'selected' => 'area_type_name',
                'type' => 'select',
                'name' => 'area_type',
            ),
            array(
                'label' => 'Tipo de vivienda',
                'options_model' => $this->Housingtype->findAll(),
                'selected' => 'housingtype_name',
                'type' => 'select',
                'name' => 'housing_type',
            ),
            array(
                'label' => 'Modelo de negocio',
                'options_model' => $this->BusinessModel->findAll(),
                'selected' => 'businessmodel_name',
                'type' => 'select',
                'name' => 'business_model',
            ),
            array(
                'label' => 'Tipo de mercado',
                'options_model' => $this->MarketType->findAll(),
                'selected' => 'markettype_name',
                'type' => 'select',
                'name' => 'market_type',
            ),
            array(
                'label' => 'Habitaciones',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bedrooms',
            ),
            array(
                'label' => 'Baños',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'bathrooms',
            ),
            array(
                'label' => 'Puestos de estacionamiento',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'garages',
            ),
            array(
                'label' => 'Construcción m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_construction',
            ),
            array(
                'label' => 'Terreno m²',
                'placeholder' => '0',
                'type' => 'number',
                'name' => 'meters_land',
            ),
            array(
                'label' => 'Estado',
                'options_model' => $this->State->findAll(),
                'selected' => 'state_name',
                'type' => 'select',
                'name' => 'state',
            ),
            array(
                'label' => 'Municipio',
                'options_model' => $this->Municipality->findAll(),
                'selected' => 'municipality_name',
                'type' => 'select',
                'name' => 'municipality',
            ),
            array(
                'label' => 'Dirección',
                'placeholder' => 'Ej: Av. San Martin',
                'type' => 'text',
                'name' => 'address',
            ),
            array(
                'label' => 'Precio',
                'placeholder' => '000000',
                'type' => 'number',
                'name' => 'price',
            )
        ];

        /* GENERAMOS NUESTRO FORM */
        $this->generate_form($urlpost, $title, $prefix, $data, $model_form, $controls);
        
        /* GENERAMOS NUESTRA PÁGINA */
        $this->generate_template($this->settings["url"]);
    }
}
