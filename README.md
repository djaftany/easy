# easy

Este repositório gerado especialmente para **Hilton**, ilustra como usar recuros básicos para gerar funcionalidades avançadas na construção de websites modernos.

Usando PHP em combinação com JavaScript torna-se possível contruir uma API segura e consumi-la através de chamadas JavasCript.

Neste projeto está sendo usado o JS modular - significa que é possível importar/exportar código JS entre arquivos (módulos).

Como deve ter notado o diretório:

`app` - guarda o código principal da aplicação, como classes, bibliotecas e outras dependếncias funcionais.

`api` - Contem os arquivos que formam as rotas ou endpoints ou urls da aplicação. O accesso a estas rostas está protegido pela variável url **api_secret** e internamente definida como **API_SECRET**. Então sempre que executar uma chamada não esqueça de inclui-la na sua url.

`css, img e js` - São as mesmas já conhecidas para arquivos estáticos.