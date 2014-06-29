<?php

class Mplayer {
    const RUN_CMD = 'HOME=%s mplayer -slave -quiet -input file=%s %s </dev/null &>%s & echo $!';
	const SHELL_EXEC = 'bash -c %s';

    const CMD_LOADFILE = 'loadfile';
	const CMD_STOP = 'stop';

    public function getPid() {
        $pid = @file_get_contents(MPLAYER_PID);
        if (!$pid)
            return null;
        return posix_kill($pid, 0) ? $pid : null;
    }

    public function run($url) {
        @posix_mkfifo(MPLAYER_FIFO, 0644);
        $cmd = sprintf(self::RUN_CMD,
            escapeshellarg(MPLAYER_HOME),
            escapeshellarg(MPLAYER_FIFO),
            escapeshellarg($url),
            escapeshellarg(MPLAYER_OUTPUT)
        );
		$cmd = sprintf(self::SHELL_EXEC,
			escapeshellarg($cmd));
        if (!($pid = exec($cmd)))
            return false;
        file_put_contents(MPLAYER_PID, $pid);
        return true;
    }

    public function sendCmd($cmd) {
        $args = func_get_args();
        array_shift($args);
        foreach ($args as $arg)
            $cmd .= ' ' . escapeshellarg($arg);
        $cmd .= "\n";
        file_put_contents(MPLAYER_FIFO, $cmd);
    }

    public function play($url) {
        if (!$this->getPid())
            return $this->run($url);
        $this->sendCmd(self::CMD_LOADFILE, $url);
    }
}

// vim: ts=4 sw=4 et
