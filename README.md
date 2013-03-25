bracket-calculator
==================

Numerology based NCAA tournament calculator.

===============
SUMMARY & USAGE
===============

This is my tongue-in-cheek response to those in my office who (IMHO) take things such as the NCAA basketball tournament perhaps a bit too seriously and spend too much time researching teams and trying to decide how to fill out their brackets.  Every year we are persuaded to join these competitions that mean *nothing* to those of us who do not follow collegiate basketball.

It is meant to be executed via CLI.  When run, you will be given a numbered list of the current teams (this was written for 2013, I intend to use and update this each year that I work in such an office environment.)  For each game you choose the top line team's number, then the bottom line team's number.  Finally it is necessary to enter the ISO 8601 formatted (ie 2013-03-19 12:00:00) date and time that the game will start in GMT.  The script will then determine and present which team is likely to win.


===========================
EXPLANATION OF METRICS USED
===========================

I have been asked repeatedly (mostly by those who have spent days upon days researching statistics for their own brackets) about the specifics I have used to write the algorithm used here.  Mostly I have been vague or have told them I will tell more after the current tournament.  Last year I did a similar thing, but far simpler; it only used a pure random number generator.  Typically a random sampling would statistically give a success rate of about 30%; however when the tournament was over my point standing was about 10%.  So I wanted to use something that was quite a bit more complex and had more variation, as well as something that was directly influenced by the specifics of each team and each game scenario.

A friend of mine has shown me a bit about numerology, using aspects of a person such as their name and birth date to calculate specific numbers which each have defined properties.  I thought this might be a decent way of tying a metric to an individual team.  The algorithm uses a loosely interpreted form of Chaldean numerology to assign a positive, negative, or neutral single and compound (ie single digit and double digit) numeral value to each team name.

As for the game itself, I opted to rely upon the lunar cycle.  It is something that can be fairly easily calculated given an accurate date and time.  And for all we know it really could be having an effect on the game play; given the difference in gravitational pull, light differences at night effecting sleep patterns, etc....who knows? ;)  And so my algorithm takes into account various aspects such as how many days into the lunar cycle we are when the game starts, how far from the center of the earth the moon currently is, and what phase of the cycle the moon is in.  Those values are used to counter each team's numerological constants to certain degrees.

Finally the teams are matched up.  All of the numbers are totalled up for each team, and each ends up with either a negative or positive score.  The team with the highest score is declared a winner.  When there is a tie, or when a specific team's number is a neutral value, a random element of a certain degree is introduced.  As such, no two brackets will ever be exactly the same.


===============
RESULTS TO DATE
===============

At this point, all games from the first day of round 1 of the 2013 tournament have completed.  Throughout the day it has been fairly steady at a 75% success rate.  12 out 16 games were successfully predicted.

That is better than the majority of my coworkers so far. :)

UPDATE: The second round has ended.  I have fallen considerably in the rankings.  All of the games in which the input to this script were in fact the actual teams playing and the correct starting times had a fairly consistent success rate of 75%.  However, once we moved into subsequent rounds in which there were games that had teams playing which were not input parameters in the script (ie, the outcome of previous games were incorrect and therefore one of the contenders was predicted incorrectly) and the starting time had not yet been scheduled, the success rate dropped off *dramatically.*  I have modified the script to require only a date instead of a time to see if that makes a difference and have filled out a new "second chance" bracket with the last 16 teams in the NCAA tournament to see if that change effects the success rate of the script, and if it improves upon the date/time issues.  Unfortunately that won't do anything for the fact that subsequent round games weren't accurately handled via the script, but I think it's the best that can be done at the moment.
