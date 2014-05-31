<nav id="menu_principal">
	<ul id="main-menu" class="sm sm-simple">
		<li>
			<a href="/" data-ng-class="getClass('/')">Home</a>
		</li>
		<li>
			<a href="/empresa"  data-ng-class="getClass('/empresa')">Empresa</a>
		</li>
		<li>
			<a href="/consultar/noticia"  data-ng-class="getClass('/consultar/noticia')">Noticias</a>
		</li>
		<li>
			<a href="/consultar/evento"  data-ng-class="getClass('/consultar/evento')">Eventos</a>
		</li>

		<li><a href="">Ofertas</a>
		    <ul>
		      	<li><a href="/consultar/venda" data-ng-class="getClass('/consultar/venda')">Ofertas de Venda</a>
					<ul>
						<li><a href="/consultar/venda" data-ng-class="getClass('/consultar/venda')">Consultar</a></li>
						<li><a href="/nova-oferta/venda" data-ng-class="getClass('/nova-oferta/venda')">Cadastrar</a></li>
					</ul>
		      	</li>
		      	<li><a href="/consultar/compra" data-ng-class="getClass('/consultar/compra')">Ofertas de Compra</a>
					<ul>
						<li><a href="/consultar/compra" data-ng-class="getClass('/consultar/compra')">Consultar</a></li>
						<li><a href="/nova-oferta/compra" data-ng-class="getClass('/nova-oferta/compra')">Cadastrar</a></li>
					</ul>
		      	</li>
		    </ul>
		</li>

		<li>
			<a href="/contato" data-ng-class="getClass('/contato')">Contato</a>
		</li>

	</ul>
</nav>