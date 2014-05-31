scope.render = function () {
	var current = scope.currentPiece.getPiece(),
		posX = scope.currentPiece.getPosX(),
		posY = scope.currentPiece.getPosY(), helpX = 0,
		offX = 0;

	ctx.clearRect(0, 0, Tetris.WIDTH, Tetris.HEIGHT);

	ctx.strokeStyle = 'black';

	for ( var x = 0; x < Tetris.COLS; ++x ) {
		for (var y = 0; y < Tetris.ROWS; ++y ) {
			ctx.fillStyle = Tetris.COLORS[scope.tetrisBoard[ y ][ x ]];
			scope.drawBlock(x, y);
		}
	}

	ctx.fillStyle = 'red';
	ctx.strokeStyle = 'black';

	offX = posX < 0 ? -posX : 0;

	for ( var y = 0 ; y < 4; ++y ) {
		for ( var x = 0; x < 4; ++x ) {
			if ( current[ y ] [ x ] ) {
				ctx.fillStyle = Tetris.COLORS[current[ y ][ x ]];
				scope.drawBlock(posX + x, posY + y);
			}
		}
	}
};

$scope.movePiece = function (dir) {
	var x = $scope.current.getPosX() + dir,
		y = $scope.current.getPosY(),
		piece = $scope.current.getPiece(),
		minX = 4, maxX = 0;
	
	var teste = [[0,1,1,0],[0,1,1,0],[0,0,0,0],[0,0,0,0]];

	for ( var i = 0; i < 4; ++i ) {
		for ( var j = 0;  j <  4;  ++j ) {
			if ( piece[i][j] > 0) {
				if ( j < minX ) {
					minX = j;
				}
				if ( j > maxX) {
					maxX = j;
				}
			}
		}
	}

	if ( isValid(x, y) ) {
		$scope.current.setPosX(x);
		$scope.render(minX);
	}
};