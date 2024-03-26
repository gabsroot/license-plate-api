<?php
    header("Content-Type: application/json");

    class PlateLookup {
        private $plate;
        private $response;

        public function __construct($plate) {
            $this->plate = $plate;
            $this->runSearch();
        }

        private function runSearch() {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://consultaplaca.com.br/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query(["placa" => $this->plate])
            ]);

            $this->response = curl_exec($curl);
            curl_close($curl);
        }

        private function getValue($str, $key) {
            $matches = [];

            preg_match("/" . preg_quote($key, "/") . "([^<]+)/", $str, $matches);

            if (isset($matches[1])) {
                return trim($matches[1]);
            }

            return "";
        }

        public function responseData() {
            $result = [];
            
            if (str_contains($this->response, "Marca/Modelo") || str_contains($this->response, "Placa:</code>")) {
                $result["marca"] = $this->getValue($this->response, 'Marca:</code>');
                $result["modelo"] = $this->getValue($this->response, 'Modelo:</code>');
                $result["submodelo"] = $this->getValue($this->response, 'Submodelo:</code>');
                $result["versao"] = $this->getValue($this->response, 'Versão:</code>');
                $result["ano"] = $this->getValue($this->response, 'Ano:</code>');
                $result["anoModelo"] = $this->getValue($this->response, 'Ano/Modelo:</code>');
                $result["situacaoCod"] = $this->getValue($this->response, 'Cód/Situação:</code>');
                $result["marcaModelo"] = $this->getValue($this->response, 'Marca/Modelo:</code>');
                $result["municipio"] = $this->getValue($this->response, 'Município:</code>');
                $result["origem"] = $this->getValue($this->response, 'Origem:</code>');
                $result["placa"] = $this->getValue($this->response, 'Placa:</code>');
                $result["placaMercosul"] = $this->getValue($this->response, 'Placa Alternativa:</code>');
                $result["situacao"] = $this->getValue($this->response, 'Situação:</code>');
                $result["subSegmento"] = $this->getValue($this->response, 'Sub-seguimento:</code>');
                $result["uf"] = $this->getValue($this->response, 'UF:</code>');
                $result["caixaCambio"] = $this->getValue($this->response, 'Caixa Cambio: </code>');
                $result["capMaxTracao"] = $this->getValue($this->response, 'Cap Maxima Tracao: </code>');
                $result["carroceria"] = $this->getValue($this->response, 'Carroceria: </code>');
                $result["chassi"] = $this->getValue($this->response, 'Chassi: </code>');
                $result["cilindradas"] = $this->getValue($this->response, 'Cilindradas: </code>');
                $result["combustivel"] = $this->getValue($this->response, 'Combustivel: </code>');
                $result["di"] = $this->getValue($this->response, 'Di: </code>');
                $result["eixoTraseiroDif"] = $this->getValue($this->response, 'Eixo Traseiro Dif: </code>');
                $result["eixos"] = $this->getValue($this->response, 'Eixos: </code>');
                $result["especie"] = $this->getValue($this->response, 'Especie: </code>');
                $result["faturado"] = $this->getValue($this->response, 'Faturado: </code>');
                $result["grupo"] = $this->getValue($this->response, 'Grupo: </code>');
                $result["limiteRestricaoTrib"] = $this->getValue($this->response, 'Limite Restricao Trib: </code>');
                $result["linha"] = $this->getValue($this->response, 'Linha: </code>');
                $result["mediaPreco"] = $this->getValue($this->response, 'Media Preco: </code>');
                $result["motor"] = $this->getValue($this->response, 'Motor: </code>');
                $result["pesoBrutoTotal"] = $this->getValue($this->response, 'Peso Bruto Total: </code>');
                $result["qtdePassageiros"] = $this->getValue($this->response, 'Quantidade Passageiro: </code>');
                $result["renavam"] = $this->getValue($this->response, 'Renavam: </code>');
                $result["restricao1"] = $this->getValue($this->response, 'Restricao 1: </code>');
                $result["restricao2"] = $this->getValue($this->response, 'Restricao 2: </code>');
                $result["restricao3"] = $this->getValue($this->response, 'Restricao 3: </code>');
                $result["restricao4"] = $this->getValue($this->response, 'Restricao 4: </code>');
                $result["sEspecie"] = $this->getValue($this->response, 'S.especie: </code>');
                $result["segmento"] = $this->getValue($this->response, 'Segmento: </code>');
                $result["situacaoChassi"] = $this->getValue($this->response, 'Situacao Chassi: </code>');
                $result["situacaoVeiculo"] = $this->getValue($this->response, 'Situacao Veiculo: </code>');
                $result["tipoDocFaturado"] = $this->getValue($this->response, 'Tipo Doc Faturado: </code>');
                $result["tipoDocImportadora"] = $this->getValue($this->response, 'Tipo Doc Importadora: </code>');
                $result["tipoDocProprietario"] = $this->getValue($this->response, 'Tipo Doc Prop: </code>');
                $result["tipoMontagem"] = $this->getValue($this->response, 'Tipo Montagem: </code>');
                $result["tipoVeiculo"] = $this->getValue($this->response, 'Tipo Veículo: </code>');
                $result["ufFaturado"] = $this->getValue($this->response, 'Uf Faturado: </code>');
                $result["unidadeLocalSrf"] = $this->getValue($this->response, 'Unidade Local Srf: </code>');
            }
            
            return $result;
        }
    }

    if (!isset($_GET["plate"]) || !$_GET["plate"]) {
        die(json_encode(["error" => "Insert the vehicle license plate in the GET <plate> parameter."]));
    }

    $plate = $_GET["plate"];

    if (!preg_match('/^[A-Z]{3}-?\d{4}$|^[A-Z]{3}\d[A-Z]\d{2}$/i', $plate)) {
        die(json_encode(["error" => "Invalid plate, please enter a plate in Brazilian format."]));
    }

    $lookup = new PlateLookup($plate);
    $response = $lookup->responseData();

    echo json_encode($response, JSON_PRETTY_PRINT);
?>