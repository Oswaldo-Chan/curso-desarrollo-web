<?php

namespace Classes;

class Paginacion {
    public $paginaActual;
    public $registrosPorPagina;
    public $totalRegistros;

    public function __construct($paginaActual = 1, $registrosPorPagina = 10, $totalRegistros = 0) {
        $this->paginaActual = (int) $paginaActual;
        $this->registrosPorPagina = (int) $registrosPorPagina;
        $this->totalRegistros = (int) $totalRegistros;
    }

    public function offset(){
        return $this->registrosPorPagina * ($this->paginaActual - 1);
    }

    public function totalPaginas(){
        return ceil($this->totalRegistros / $this->registrosPorPagina);
    }

    public function paginaAnterior(){
        $anterior = $this->paginaActual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function paginaSiguiente(){
        $siguiente = $this->paginaActual + 1;
        return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
    }

    public function enlaceAnterior(){
        $html = '';
        if($this->paginaAnterior()){
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaAnterior()}\">&laquo Anterior</a>";
        }
        return $html;  
    }

    public function enlaceSiguiente(){
        $html = '';
        if($this->paginaSiguiente()){
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaSiguiente()}\">Siguiente &raquo</a>";
        }
        return $html;
    }

    public function numerosPaginas(){
        $html = '';

        for($i=1; $i<=$this->totalPaginas(); $i++){
            if($i === $this->paginaActual){
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$i}</span>";
            } else {
                $html.= "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page={$i}\">{$i}</a>";
            }
        }
        return $html;
    }

    public function paginacion(){
        $html = '';
        if($this->totalRegistros > 1){
            $html .= '<div class="paginacion">';
            $html .= $this->enlaceAnterior();
            $html .= $this->numerosPaginas();
            $html .= $this->enlaceSiguiente();
            $html .= '</div';
        }
        return $html;
    }
}