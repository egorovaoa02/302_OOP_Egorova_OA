<?php

function runTest()
{
    /*
     * Проверка работы методов класса Student
    */

    echo "Проверка класса Student" . PHP_EOL . PHP_EOL;

    // Проверка методов set
    $student1 = new Student();
    $student1->setFirstname("Ольга")->setLastname("Егорова")->setFaculty("ФМиИТ")->setCourse(3)->setGroup(302);

    $student2 = new Student();
    $student2->setFirstname("Петр")->setLastname("Морозов")->setFaculty("ФМиИТ")->setCourse(3)->setGroup(302);

    $student3 = new Student();
    $student3->setFirstname("Ангелина")->setLastname("Максимова")->setFaculty("ФМиИТ")->setCourse(3)->setGroup(302);

    // Проверка автоинкременции поля id
    $ids = $student1->getId() . " " . $student2->getId() . " " . $student3->getId();
    $expected = "1 2 3";
    if ($ids == $expected) {
        echo"Проверка автоинкременции поля id ПРОШЛА" . PHP_EOL;
    } else {
        echo"Проверка автоинкременции поля id НЕ ПРОШЛА". PHP_EOL;
    }

    // Проверка всех методов get
    $info = "Id: {$student3->getId()}" . PHP_EOL
        . "Фамилия: {$student3->getLastname()}" . PHP_EOL
        . "Имя: {$student3->getFirstname()}" . PHP_EOL
        . "Факультет: {$student3->getFaculty()}" . PHP_EOL
        . "Курс: {$student3->getCourse()}" . PHP_EOL
        . "Группа: {$student3->getGroup()}" . PHP_EOL;

    $expected = $student3->__toString();

    if ($info === $expected) {
       echo"Проверка всех методов get ПРОШЛА" . PHP_EOL;
    } else {
        echo"Проверка всех методов get НЕ ПРОШЛА" . PHP_EOL;
    }

    // Проверка работы метода __toString()
    echo "Метод __toString():" . PHP_EOL . $student1->__toString() . PHP_EOL;

    /*
     * Проверка работы методов класса StudentsList
    */

    echo "Проверка класса StudentsList" . PHP_EOL . PHP_EOL;

    $studentsList = new StudentsList();

    // Проверка метода add()
    $studentsList->add($student1);
    $studentsList->add($student2);
    $studentsList->add($student3);

    // Проверка метода count()
    $studentNumber = $studentsList->count();
    $expected = 3;
    if ($studentNumber == $expected) {
        echo "Проверка метода count() ПРОШЛА" . PHP_EOL;
    } else {
        echo "Проверка метода count() НЕ ПРОШЛА" . PHP_EOL;
    }

    // Проверка метода get
    if ($student3 === $studentsList->get(2)) {
        echo "Проверка метода get() ПРОШЛА" . PHP_EOL;
    } else {
        echo "Проверка метода get() НЕ ПРОШЛА" . PHP_EOL;
    }

    // Проверка метода store()

    $fileName = "students.txt";
    if ($studentsList->store($fileName)) {
        echo "Проверка метода store() ПРОШЛА" . PHP_EOL;
    } else {
        echo "Проверка метода store() НЕ ПРОШЛА" . PHP_EOL;
    }

    // Проверка метода load()
    $studentsList1 = new StudentsList();

    if ($studentsList1->load($fileName) && $studentsList1->count() === 3) {
        echo "Проверка метода load() ПРОШЛА" . PHP_EOL;
    } else {
       echo "Проверка метода load() НЕ ПРОШЛА" . PHP_EOL;
    }
}
