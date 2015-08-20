<?php

namespace Cinetic\AvisosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Avisos
 *
 * @ORM\Table(name="avisos")
 * @ORM\Entity
 */
class Avisos
{
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
     * @ORM\Column(name="nombre", type="string", length=50, unique=TRUE)
     *
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     *
     * @Assert\NotBlank()
     *
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="metodo", type="string", length=6)
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"popup", "teaser", "banner", "faldon"})
     */
    private $metodo;

    /**
     * @var string
     *
     * @ORM\Column(name="condicion", type="string", length=6)
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"pagina", "tiempo", "numero", "scroll"})
     */
    private $condicion;

    /**
     * @var string
     *
     * @ORM\Column(name="pagina", type="string", length=255, nullable=TRUE)
     */
    private $pagina;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo", type="integer", nullable=TRUE)
     */
    private $tiempo;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="integer", nullable=TRUE)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="scroll", type="integer", nullable=TRUE)
     */
    private $scroll;

    /**
     * @var string
     *
     * @ORM\Column(name="repeticion", type="integer")
     */
    private $repeticion;

    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="integer")
     *
     * @Assert\Choice(choices = {"0", "1", "2", "3","4"})
     * @Assert\NotBlank()
     */
    private $destino;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string", length=50, nullable=TRUE)
     *
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=TRUE)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $codigo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Avisos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Avisos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set metodo
     *
     * @param string $metodo
     * @return Avisos
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo
     *
     * @return string 
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set condicion
     *
     * @param string $condicion
     * @return Avisos
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }

    /**
     * Get condicion
     *
     * @return string 
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Set pagina
     *
     * @param string $pagina
     * @return Avisos
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get pagina
     *
     * @return string 
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set tiempo
     *
     * @param string $tiempo
     * @return Avisos
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get tiempo
     *
     * @return string 
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Avisos
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set scroll
     *
     * @param string $scroll
     * @return Avisos
     */
    public function setScroll($scroll)
    {
        $this->scroll = $scroll;

        return $this;
    }

    /**
     * Get scroll
     *
     * @return string 
     */
    public function getScroll()
    {
        return $this->scroll;
    }

    /**
     * Set repeticion
     *
     * @param string $repeticion
     * @return Avisos
     */
    public function setRepeticion($repeticion)
    {
        $this->repeticion = $repeticion;

        return $this;
    }

    /**
     * Get repeticion
     *
     * @return string 
     */
    public function getRepeticion()
    {
        return $this->repeticion;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Avisos
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set grupo
     *
     * @param string $grupo
     * @return Avisos
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Avisos
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Avisos
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context)
    {
        switch($this->getCondicion())
        {
            case 'pagina':
                $page = $this->getPagina();
                if(empty($page)){
                    $context->buildViolation('Página específica no tendría que estar vacía.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setTiempo(null);
                $this->setNumero(null);
                $this->setScroll(null);
                break;
            case 'tiempo':
                $time = $this->getTiempo();
                if(empty($time)){
                    $context->buildViolation('Tiempo en página no tendría que estar vacío.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setPagina(null);
                $this->setNumero(null);
                $this->setScroll(null);
                break;
            case 'numero':
                $number = $this->getNumero();
                if(empty($number)){
                    $context->buildViolation('Número de páginas vistas no tendría que estar vacío.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setPagina(null);
                $this->setTiempo(null);
                $this->setScroll(null);
                break;
            case 'scroll':
                $scroll = $this->getScroll();
                if(empty($scroll)){
                    $context->buildViolation('Scroll no tendría que estar vacío.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setPagina(null);
                $this->setTiempo(null);
                $this->setNumero(null);
                break;
            default:
                $this->setPagina(null);
                $this->setTiempo(null);
                $this->setNumero(null);
                $this->setScroll(null);
                break;
        }
        switch($this->getDestino())
        {
            case '3':
                $group = $this->getGrupo();
                if(empty($group)){
                    $context->buildViolation('Grupo no tendría que estar vacío.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setUsuario(null);
                break;
            case '4':
                $user = $this->getUsuario();
                if(empty($user)){
                    $context->buildViolation('ID del usuario no tendría que estar vacía.')
                        ->atPath('avisos_create')
                        ->addViolation();
                }
                $this->setGrupo(null);
                break;
            default:
                $this->setUsuario(null);
                $this->setGrupo(null);
                break;
        }

        $codigo = $this->getCodigo();
        if(empty($codigo)){
            $context->buildViolation('La casilla código no puede estar vacía.')
                ->atPath('avisos_create')
                ->addViolation();
        }

    }
}
