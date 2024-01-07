<?php

    namespace Alisson\model;

	require_once '../autoload.php';

    class LivroModel {

        private int $idLivro;
        private string $nomeLivro;
        private string $autorLivro;
        private bool $disponivel;
        private string $dataInicio;
        private string $dataDevolucao;

        public function __construct(int $idLivro, string $nomeLivro, string $autorLivro, bool $disponivel, string $dataInicio, string $dataDevolucao) {
            $this->idLivro = $idLivro;
            $this->nomeLivro = $nomeLivro;
            $this->autorLivro = $autorLivro;
            $this->disponivel = $disponivel;
            $this->dataInicio = $dataInicio;
            $this->dataDevolucao = $dataDevolucao;
        }


        //Getters
        public function getIdLivro(): int 
		{
			return $this->idLivro;
		}
        
        public function getNomeLivro(): string 
		{
			return $this->nomeLivro;
		}

        public function getAutorLivro(): string 
		{
			return $this->autorLivro;
		}

        public function getDisponivel(): bool 
		{
			return $this->disponivel;
		}

        public function getDataInicio(): string 
		{
			return $this->dataInicio;
		}

        public function getDataDevolucao(): string 
		{
			return $this->dataDevolucao;
		}

        //Setters
        public function setIdLivro(int $idLivro): void 
		{
			$this->idLivro = $idLivro;
		}
        
        public function setNomeLivro(string $nomeLivro): void 
		{
			$this->nomeLivro = $nomeLivro;
		}

        public function setAutorLivro(string $autorLivro): void 
		{
			$this->autorLivro = $autorLivro;
		}

        public function setDisponivel(bool $disponivel): void 
		{
			$this->disponivel = $disponivel;
		}

        public function setDataInicio(string $dataInicio): void 
		{
			$this->dataInicio = $dataInicio;
		}

        public function setDataDevolucao(string $dataDevolucao): void 
		{
			$this->dataDevolucao = $dataDevolucao;
		}    

    }

    