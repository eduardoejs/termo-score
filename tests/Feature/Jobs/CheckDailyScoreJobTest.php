<?php

use App\Jobs\CheckDailyScoreJob;
use App\Models\DailyScore;
use App\Models\WordOfDay;
use App\Notifications\DailyScoreNotification;
use Illuminate\Support\Facades\Notification;

it('should calculate the correct points', function ($gameScore, $expectedPoints) {
    
    // Arrange
    $dailyScore = DailyScore::factory()->create(['game_id' => 1, 'score' => $gameScore, 'word' => 'score']);
    $word       = WordOfDay::factory()->create(['word' => 'score', 'game_id' => 1]);

    // Act
    CheckDailyScoreJob::dispatchSync($word, $dailyScore); // force the job run syncronous

    // Assert
    expect($dailyScore->refresh())
        ->points->toBe($expectedPoints)
        ->status->toBe(DailyScore::STATUS_FINISHED);
})->with([
    '10 points'  => ['1/6', 10],
    '5 points'   => ['2/6', 5],
    '4 points'   => ['3/6', 4],
    '2 points'   => ['4/6', 2],
    '1 points'   => ['5/6', 1],
    '0 points'   => ['6/6', 0],
    'not enough' => ['X/6', -1],
    // ])->requiresMysql();
]);

it('should not calculate the points if the word is not the same', function () {
    // Arrange
    $dailyScore = DailyScore::factory()->create(['game_id' => 1, 'score' => '1/6', 'word' => 'phone']);
    $word       = WordOfDay::factory()->create(['word' => 'score', 'game_id' => 1]);
 
    // Act
     CheckDailyScoreJob::dispatchSync($word, $dailyScore); // force the job run syncronous
 
     // Assert
    expect($dailyScore->refresh())
         ->points->toBe(0)
         ->status->toBe(DailyScore::STATUS_WRONG_WORD);
});

test('the game id from the wordOfDay should be the same as the dailyScore entry', function () {
    // Arrange
    $dailyScore = DailyScore::factory()->create(['game_id' => 1, 'score' => '1/6', 'word' => 'phone']);
    $word       = WordOfDay::factory()->create(['word' => 'score', 'game_id' => 2]);

    // Act
    CheckDailyScoreJob::dispatchSync($word, $dailyScore); // force the job run syncronous

    // Assert
    expect($dailyScore->refresh())
        ->points->toBeNull()
        ->status->toBe(DailyScore::STATUS_PENDING);
});

it('should send a notification to the user whenthe CheckDailyScore is finished', function () {
    Notification::fake();

    // Arrange
    $dailyScore = DailyScore::factory()->create(['game_id' => 1, 'score' => '1/6', 'word' => 'score']);
    $word       = WordOfDay::factory()->create(['word' => 'score', 'game_id' => 1]);

    // Act
    CheckDailyScoreJob::dispatchSync($word, $dailyScore); // force the job run syncronous

    // Assert
    Notification::assertSentTo(
        $dailyScore->user,
        DailyScoreNotification::class,
        function (DailyScoreNotification $notification) use ($dailyScore) {
            return $notification->dailyScore->is($dailyScore);
        }
    );
});
