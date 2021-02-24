<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Talleres Model
 *
 * @property \App\Model\Table\CursosTable|\Cake\ORM\Association\BelongsTo $Cursos
 *
 * @method \App\Model\Entity\Tallere get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tallere newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tallere[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tallere|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tallere patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tallere[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tallere findOrCreate($search, callable $callback = null, $options = [])
 */
class TalleresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('talleres');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 800, // Width
                        'h' => 400, // Height
                        'jpeg_quality'  => 100
                    ]
                ],
                'thumbnailMethod' => 'gd'   // Options are Imagick or Gd
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha','No se puede dejar vacio!');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmpty('hora_inicio','No se puede dejar vacio!');

        $validator
            ->time('hora_fin')
            ->requirePresence('hora_fin', 'create')
            ->notEmpty('hora_fin','No se puede dejar vacio!');

        $validator
            ->requirePresence('descripcion', 'create')
            ->allowEmpty('descripcion')
            ->add('descripcion', [
                'length' => [
                    'rule' => ['minLength', 15],
                    'message' => 'El descripcion del taller debe tener al menos 15 caracteres!',
                ],
            ]);

        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules')
            // Set the thumbnail resize dimensions
            ->add('photo', 'proffer', [
                'rule' => ['dimensions', [
                    'min' => ['w' => 100, 'h' => 100],
                    'max' => ['w' => 1500, 'h' => 1500]
                ]],
                'message' => 'La imagen no tiene dimensiones correctas(Max 1500*1500 Min 100*100).',
                'provider' => 'proffer'
            ])
            ->add('photo','extension',[
                'rule' => ['extension',['jepg','png','jpg']],
                'message' => 'La imagen no tiene la extensión correcta'
            ])
            ->add('photo','fileSize',[
                'rule' => ['fileSize','<=','1MB'],
                'message' => 'La imagen no debe exceder 1MB'
            ])
            ->add('photo','mimeTye',[
                'rule' => ['mimeType',['image/jpeg','image/png']],
                'message' => 'La imagen no tiene formato correcto'
            ])

            ->allowEmpty('photo');

       $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url','No se puede dejar vacio!')
            ->add('url', 'valid-url', ['rule' => 'url','message' => 'Debe ingresar una URL válida!']);

        $validator
            ->requirePresence('nombre_expositor')
            ->allowEmpty('nombre_expositor', 'No se puede dejar vacio!')
            ->add('nombre_expositor', [
                'length' => [
                    'rule' => ['minLength', 3],
                    'message' => 'El nombre del expositor debe tener al menos 3 caracteres!',
                ],
                'validFormat' => [
                    'rule' => ['custom','/^[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+$/'],
                    'message' => 'Por favor solo ingrese letras!'
                ]
            ]);

        $validator
            ->integer('cod_pago')
            ->requirePresence('cod_pago', 'create')
            ->notEmpty('cod_pago','No se puede dejar vacio!');
        $validator
            ->integer('curso_id')
            ->requirePresence('curso_id', 'create')
            ->notEmpty('curso_id','No se puede dejar vacio!');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'));

        return $rules;
    }
}
