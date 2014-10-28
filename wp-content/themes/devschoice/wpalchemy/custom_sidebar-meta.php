<div class="my_meta_control">

	<?php $mb->the_field('sidebar_title'); ?>
		<label>Título</label>
		<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" style="width:100%;" /></p>


	<?php $mb->the_field('sidebar_contents'); ?>
		<label>Contenidos</label>
		<p><textarea class="sidebar_contents" name="<?php $mb->the_name(); ?>" style="width:100%;" class="texto"><?php $mb->the_value(); ?></textarea></p>

		<span class="description">Utiliza esta lista como modelo:</span>
			<pre class="description">
&lt;ul>
  &lt;li>
    &lt;a href="/empresa">Empresa&lt;/a>
  &lt;/li>
  &lt;li>
    &lt;a href="/equipo">Equipo&lt;/a>
  &lt;/li>
&lt;/ul>
			</pre>
</div>