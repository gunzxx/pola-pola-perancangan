<?php
interface Level{
    function start();
}

class LevelEasy implements Level{
    public function start(){
        echo 'Level Easy';
    }
}

class LevelMedium implements Level{
    public function start(){
        echo 'Level Medium';
    }
}

class LevelHard implements Level{
    public function start(){
        echo 'Level Hard';
    }
}

Interface Enemy{
    function start();
}

class EnemyEasy implements Enemy{
    public function start(){
        echo 'Enemy Easy';
    }
}

class EnemyMedium implements Enemy{
    public function start(){
        echo 'Enemy Medium';
    }
}

class EnemyHard implements Enemy{
    public function start(){
        echo 'Enemy Hard';
    }
}

interface GameFactory {
    function createLevel();
    function createEnemy();
}

class GameEasyFactory implements GameFactory{
    public function createLevel(){
        return new LevelEasy();
    }
    
    public function createEnemy(){
        return new EnemyEasy();
    }
}

class GameMediumFactory implements GameFactory{
    public function createLevel(){
        return new LevelMedium();
    }
    
    public function createEnemy(){
        return new EnemyMedium();
    }
}

class GameHardFactory implements GameFactory{
    public function createLevel(){
        return new LevelHard();
    }
    
    public function createEnemy(){
        return new EnemyHard();
    }
}

class App{
    public $level, $enemy;

    public function __construct(GameFactory $game)
    {
        $this->level = $game->createLevel();
        $this->enemy = $game->createEnemy();
    }

    public function start(){
        $this->level->start();
        echo "\n";
        $this->enemy->start();
    }
}

$game = new App(new GameEasyFactory);
$game->start();