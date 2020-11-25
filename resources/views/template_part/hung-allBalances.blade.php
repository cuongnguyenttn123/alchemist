<div class="hp-allbalance">
	<div class="ui-block">
		<div class="ui-block-title">
			<h6 class="title">All Balances</h6>
		</div>
		<div class="ui-block-content content-balance">
			<div class="skills-item-info">
				<span class="skills-item-title">
					<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Fiat Balance</span> 
				</span> 
				<span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
					<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
					<span class="units" >${{$user->wallet}}</span> USD
				</span>
			</div>
			<div class="skills-item-info">
				<span class="skills-item-title">
					<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Crafting Balance</span> 
				</span> 
				<span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
					<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
					<span class="units" >{{$user->total_credit}}</span> 
					<img class="align-top" src="svg-icons/Token/3d.svg">
				</span>
			</div>
		</div>
	</div>
</div>
