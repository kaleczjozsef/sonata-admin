<?php
/**
 * Created by PhpStorm.
 * User: kalec
 * Date: 2016. 10. 08.
 * Time: 16:38
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Sonata\TranslationBundle\Model\TranslatableInterface;

/**
 * @ORM\Table(name="app_translatable_entity")
 * @ORM\Entity()
 */
class TranslatableEntity implements TranslatableInterface
{

    use ORMBehaviors\Translatable\Translatable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nonTranslatedField;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNonTranslatableField()
    {
        return $this->nonTranslatedField;
    }

    /**
     * @param string $nonTranslatedField
     *
     * @return TranslatableEntity
     */
    public function setNonTranslatableField($nonTranslatedField)
    {
        $this->nonTranslatedField = $nonTranslatedField;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->translate(null, false)->getName();
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->translate(null, false)->setName($name);

        return $this;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->setCurrentLocale($locale);

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getCurrentLocale();
    }

}