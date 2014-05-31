<?php
namespace Blog\Widgets;

final class CotacoesAlgodao extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'CotacoesAlgodao',
			__('Cotações de Algodão', 'wpb_widget_domain'),
			array('description' => __('Widget by Arthur'),)
		);
	}

	public function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title']);

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		$html = file_get_html("http://cotacao.ruralbr.com.br/preco/algodao.html");
          $num = 1;
          $panel = 1;

          echo <<<ABALINKS
          <dl class="tabs" data-tab>
	          <dd class="active"><a href="#panel-1" target="_self">Pluma</a></dd>
	          <dd><a href="#panel-2" target="_self">Caroço</a></dd>
	        </dl>
ABALINKS;
          echo "<div class='tabs-content'>";

          foreach($html->find('div.algodao') as $node) {
            if ($num === 1) {
              echo '<span class="atualizada">', $node->find('span.atualizada', 0)->plaintext , "</span>";

              foreach($node->find("ul.conteudo-tabela") as $element) {
                $active = $panel == 1 ? " active" : "";
                echo '<div class="content' . $active . '" id="panel-' . $panel . '"' . '>';
                echo "<table class='responsive'>";
                echo "<caption><strong>";
                echo $element->find('li.produto', 0)->plaintext, "</strong></caption>";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>UF</th> <th>Praça</th> <th>Atual</th> <th>Mínima</th> <th>Máxima</th> <th>Abertura</th> <th>Fechamento</th> <th>Variação</th></tr>";
                echo "</thead>";
                foreach($element->find('ul.lista-dados') as $info) {
                $num = 0;
                echo "<tbody>";
                  foreach($info->find('li.uf') as $estado) {
                    echo "<tr>";
                    echo  "<td>", $estado->plaintext, "</td>",
                    "<td>", $info->find('li.praca', $num)->plaintext , "</td>",
                    "<td>", $info->find('li.atual', $num)->plaintext , "</td>",
                    "<td>", $info->find('li.minima', $num)->plaintext , "</td>",
                    "<td>", $info->find('li.maxima', $num)->plaintext , "</td>",
                    "<td>", $info->find('li.abertura', $num)->plaintext,  "</td>",
                    "<td>", $info->find('li.fechamento', $num)->plaintext , "</td>",
                    "<td>", $info->find('li.variacao', $num)->plaintext , "</td>";
                    
                    }
                  echo "</tbody>";
                  $num += 1;
                  }
                echo "</table>";
                echo "</div>";
                $panel+=1;
              }
            }
            
            $num+=1;
          }

         echo "</div>";
		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}