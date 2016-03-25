<?php

namespace EasyValidator;


class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function numberProvider()
    {
        return [
            [1,true],
            ['k',false]
        ];
    }

    public function stringProvider()
    {
        return [
            [1,false],
            ['tyu',true]
        ];
    }

    public function lengthProvider()
    {
        return [
            ['tyu',4,12,false],
            ['rtghyu',2,15,true]
        ];
    }

    public function testValidate()
    {
        $object = Validator::validate(1);

        $this->assertTrue($object instanceof Validator);//проверка обекта
    }

    /**
     * @dataProvider numberProvider
     */
    public function testNumber($value, $expected)
    {
        $object = Validator::validate($value);
        $result = $object->number();
        $this->assertEquals($result, $expected);
    }

    /**
     * @dataProvider stringProvider
     */
    public function testString($value, $expected)
    {
        $object = Validator::validate($value);
        $result = $object->string();
        $this->assertEquals($result, $expected);
    }

    /**
     * @dataProvider lengthProvider
     */
    public function testLength($value, $min, $max, $expected)
    {
        $object = Validator::validate($value);
        $result = $object->length($min, $max);
        $this->assertEquals($result, $expected);
    }

//    public function testNumberErrorMessage()
//    {
//        $object = Validator::validate('tyui')->number();
//        $messages = $object->getMessages();
//        $this->assertTrue($messages[0] == 'The value is\'t number.');
//    }

//    public function testOfTwoValidators()
//    {
//        $object = Validator::validate('tyui')->string()->length(2,10);
//    }

}
