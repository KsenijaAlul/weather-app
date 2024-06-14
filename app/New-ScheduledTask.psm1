psm1
# Define the action (command to execute)
$action = New-ScheduledTaskAction -Execute "php" -Argument "C:\Users\ksenija\Desktop\weather-app\artisan schedule:run"

# Define the trigger (run every minute)
$trigger = New-ScheduledTaskTrigger -Once -At (Get-Date).Date -RepetitionInterval (New-TimeSpan -Minutes 1) -RepetitionDuration ([timespan]::MaxValue)

# Create the scheduled task
Register-ScheduledTask -TaskName "LaravelScheduler" -Action $action -Trigger $trigger -RunLevel Highest -User "SYSTEM"