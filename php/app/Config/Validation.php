<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];
	
	public $cuadernos =[
        'titulo'        => 'required|min_length[3]|max_length[255]',
        'descripcion'   => 'required|min_length[3]|max_length[5000]',
        'oculto'        => 'min_length[0]|max_length[5000]',
        'clave'         => 'min_length[0]|max_length[5000]',
        'estado'        => 'min_length[0]|max_length[20]',
        'categoria_id'  => 'min_length[0]|max_length[20]',
        'usuario_id'    => 'min_length[0]|max_length[20]'
    ];
    
    public $categorias =[
        'nombre'        => 'required|min_length[3]|max_length[255]',
        'descripcion'   => 'required|min_length[3]|max_length[5000]'
    ];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
