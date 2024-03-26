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
    "marca": "xxx",
    "modelo": "xxx",
    "submodelo": "xxx",
    "versao": "xxx",
    "ano": "xxx",
    "anoModelo": "xxx",
    "situacaoCod": "xxx",
    "marcaModelo": "xxx",
    "municipio": "xxx",
    "origem": "xxx",
    "placa": "xxx",
    "placaMercosul": "xxx",
    "situacao": "xxx",
    "subSegmento": "xxx",
    "uf": "xxx",
    "caixaCambio": "xxx",
    "capMaxTracao": "xxx",
    "carroceria": "xxx",
    "chassi": "xxx",
    "cilindradas": "xxx",
    "combustivel": "xxx",
    "di": "xxx",
    "eixoTraseiroDif": "xxx",
    "eixos": "xxx",
    "especie": "xxx",
    "faturado": "xxx",
    "grupo": "xxx",
    "limiteRestricaoTrib": "xxx",
    "linha": "xxx",
    "mediaPreco": "xxx",
    "motor": "xxx",
    "pesoBrutoTotal": "xxx",
    "qtdePassageiros": "xxx",
    "renavam": "xxx",
    "restricao1": "xxx",
    "restricao2": "xxx",
    "restricao3": "xxx",
    "restricao4": "xxx",
    "sEspecie": "xxx",
    "segmento": "xxx",
    "situacaoChassi": "xxx",
    "situacaoVeiculo": "xxx",
    "tipoDocFaturado": "xxx",
    "tipoDocImportadora": "xxx",
    "tipoDocProprietario": "xxx",
    "tipoMontagem": "xxx",
    "tipoVeiculo": "xxx",
    "ufFaturado": "xxx",
    "unidadeLocalSrf": "xxx"
}
```