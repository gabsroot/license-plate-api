# Brazilian license plate API

This is a simple and free tool that provides information about vehicles. It is easy to use and available to everyone. With this API, you can access important vehicle details without any hassle. However, it is important to highlight that the information is obtained through scraping of the website www.consultaplaca.com.br. Credit for the data belongs to the website. I am not responsible for the misuse of information provided by the API.

## Documentation

#### Returns all items

```http
  GET /?plate=AAA0000
```

| Parameter   | Type       | Description                           |
| :---------- | :--------- | :---------------------------------- |
| `plate` | `string` | **Required** - Vehicle plate |

## Response

```json
{
    "marca": "",
    "modelo": "",
    "submodelo": "",
    "versao": "",
    "ano": "",
    "anoModelo": "",
    "situacaoCod": "",
    "marcaModelo": "",
    "municipio": "",
    "origem": "",
    "placa": "",
    "placaMercosul": "",
    "situacao": "",
    "subSegmento": "",
    "uf": "",
    "caixaCambio": "",
    "capMaxTracao": "",
    "carroceria": "",
    "chassi": "",
    "cilindradas": "",
    "combustivel": "",
    "di": "",
    "eixoTraseiroDif": "",
    "eixos": "",
    "especie": "",
    "faturado": "",
    "grupo": "",
    "limiteRestricaoTrib": "",
    "linha": "",
    "mediaPreco": "",
    "motor": "",
    "pesoBrutoTotal": "",
    "qtdePassageiros": "",
    "renavam": "",
    "restricao1": "",
    "restricao2": "",
    "restricao3": "",
    "restricao4": "",
    "sEspecie": "",
    "segmento": "",
    "situacaoChassi": "",
    "situacaoVeiculo": "",
    "tipoDocFaturado": "",
    "tipoDocImportadora": "",
    "tipoDocProprietario": "",
    "tipoMontagem": "",
    "tipoVeiculo": "",
    "ufFaturado": "",
    "unidadeLocalSrf": ""
}
```
