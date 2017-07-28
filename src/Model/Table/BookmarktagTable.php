<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookmarktag Model
 *
 * @property \App\Model\Table\BookmarksTable|\Cake\ORM\Association\BelongsTo $Bookmarks
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\Bookmarktag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookmarktag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bookmarktag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookmarktag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookmarktag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmarktag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmarktag findOrCreate($search, callable $callback = null, $options = [])
 */
class BookmarktagTable extends Table
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

        $this->setTable('bookmarktag');
        $this->setDisplayField('bookmark_id');
        $this->setPrimaryKey('bookmark_id');

        $this->belongsTo('Bookmarks', [
            'foreignKey' => 'bookmark_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['bookmark_id'], 'Bookmarks'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
