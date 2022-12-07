let options = {
    valueNames: [ 'id', 'name','type','amount','quantity','price','total_price']
    };
    
    let userList = new List('sales', options);
    
  // 初期状態はidで昇順ソートする
    salesList.sort( 'id', {order : 'asc' });