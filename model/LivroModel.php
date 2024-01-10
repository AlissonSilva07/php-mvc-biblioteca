<?php

    namespace Alisson\model;

	require_once '../autoload.php';

    class LivroModel {

        private int $id;
        private string $titulo;
        private string $autoria;
        private string $editora;
        private int $anoPublicacao;
        private bool $disponivel;
        private string $dataCriacao;

        public function __construct(string $titulo, string $autoria, string $editora, int $anoPublicacao, bool $disponivel) {
            $this->titulo = $titulo;
            $this->autoria = $autoria;            
            $this->editora = $editora;
            $this->anoPublicacao = $anoPublicacao;
            $this->disponivel = $disponivel;
        }


        //Getters
        public function getId(): int 
		{
			return $this->id;
		}
        
        public function getTitulo(): string 
		{
			return $this->titulo;
		}

        public function getAutoria(): string 
		{
			return $this->autoria;
		}

        public function getEditora(): string 
		{
			return $this->editora;
		}

        public function getAnoPublicacao(): int 
		{
			return $this->anoPublicacao;
		}

        public function getDisponivel(): bool 
		{
			return $this->disponivel;
		}

		public function getDataCriacao(): string 
		{
			return $this->dataCriacao;
		}

        //Setters
        public function setId(int $id): void 
		{
			$this->id = $id;
		}
        
        public function setTitulo(string $titulo): void 
		{
			$this->titulo = $titulo;
		}

        public function setAutoria(string $autoria): void 
		{
			$this->autoria = $autoria;
		}

        public function setEditora(string $editora): void 
		{
			$this->editora = $editora;
		}

        public function setAnoPublicacao(int $anoPublicacaoanoPublicacao): void 
		{
			$this->anoPublicacao = $anoPublicacao;
		}

        public function setDisponivel(bool $disponivel): void 
		{
			$this->disponivel = $disponivel;
		}

		public function setDataCriacao(string $dataCriacao): void 
		{
			$this->dataCriacao = $dataCriacao;
		}        
    }

    