{config_load file="$conf_file"}

{include file='header.tpl'}

		<div id="main">
			<div id="main-precontents"></div>
			<div id="main-contents" class="main-contents">
				<script type="text/javascript">
					g_initPath({$page.path});
				</script>

				<div id="lv-npcs" class="listview"></div>

				<script type="text/javascript">
					{include file='bricks/creature_table.tpl' id='npcs' data=$npcs}
				</script>

				<div class="clear"></div>
			</div>
		</div>

{include file='footer.tpl'}
