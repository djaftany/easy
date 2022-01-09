# easy

Este repositório gerado especialmente para **Hilton**, ilustra como usar recuros básicos para gerar funcionalidades avançadas na construção de websites modernos.

Usando PHP em combinação com JavaScript torna-se possível contruir uma API segura e consumi-la através de chamadas JavasCript.

Neste projeto está sendo usado o JS modular - significa que é possível importar/exportar código JS entre arquivos (módulos).

Como deve ter notado o diretório:

`app` - guarda o código principal da aplicação, como classes, bibliotecas e outras dependếncias funcionais.

`api` - Contem os arquivos que formam as rotas ou endpoints ou urls da aplicação. O accesso a estas rostas está protegido pela variável url **api_secret** e internamente definida como **API_SECRET**. Então sempre que executar uma chamada não esqueça de inclui-la na sua url.

É importante lembrar que esta é uma API `RESTFULL / REST`. Significa que 
precisa saber o básico sobre métodos http:
<ul>
  <li>
  PUT - Usado para aualizar os registos exitentes no seridor.</li>
    <li> 
    GET - Usado para buscar dados. Ele não altera o estado do servidor.
    </li>
    <li> 
    POST - Usado para enviar dados. Ele altera o estado do servidor, pois insere novos registos.
    </li>
    <li>
    DELETE - Usado para eliminar dados. Também altera o estado do serivor,pois elimina um certo registo.
    </li>
</ul>

`css, img e js` - São as mesmas já conhecidas para arquivos estáticos.