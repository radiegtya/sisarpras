<?php

/**
 * This is the model class for table "user_schedule".
 *
 * The followings are the available columns in table 'user_schedule':
 * @property integer $id
 * @property integer $user_id
 * @property integer $schedule_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Schedule $schedule
 */
class UserSchedule extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserSchedule the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_schedule';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, schedule_id', 'numerical', 'integerOnly' => true),                       
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, schedule_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'schedule' => array(self::BELONGS_TO, 'Schedule', 'schedule_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'schedule_id' => 'Schedule',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('schedule_id', $this->schedule_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}