class element{
	
	constructor(value){	
		this.elementString = value;
		this.view = '';
		return this;
	}
	
	clone(array){
		let elementTable = $( this.elementString ).html();
		for(const [key, value] of Object.entries(array)) {
			elementTable = elementTable.replace(new RegExp(`\\b${key}\\b`, 'gi'), value);
		}
		this.view += elementTable;
		return this;
	}
	
	render(){
		$(this.elementString).html(this.view);
	}
}
