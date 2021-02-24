<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anuncios Model
 *
 * @property \App\Model\Table\CursosTable|\Cake\ORM\Association\BelongsTo $Cursos
 *
 * @method \App\Model\Entity\Anuncio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anuncio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anuncio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio findOrCreate($search, callable $callback = null, $options = [])
 */
class AnunciosTable extends Table
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
        $this->addBehavior('Timestamp');
        $this->setTable('anuncios');
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
                        'w' => 500, // Width
                        'h' => 500, // Height
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
            ->requirePresence('nombre')
            ->notEmpty('nombre', 'No se puede dejar vacio!')
            ->add('nombre', [
                'length' => [
                    'rule' => ['minLength', 3],
                    'message' => 'El nombre del anuncio debe tener al menos 3 caracteres!',
                ],
                'validFormat' => [
                    'rule' => ['custom','/^[0-9a-zA-Z áéíóúÁÉÍÓÚñÑ.]+$/'],
                    'message' => 'Por favor solo ingrese letras y numeros!'
                ],
            ]);

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->allowEmpty('descripcion');

        $validator
            ->scalar('url')
            ->requirePresence('url', 'create')
            ->notEmpty('url','No se puede dejar vacio!')
            ->add('url', 'valid-url', ['rule' => 'url']);

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
            ->scalar('curso_id')
            ->requirePresence('curso_id', 'create')
            ->notEmpty('curso_id','No puede dejar vacio!');

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
