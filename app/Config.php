<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FileManaging;
class Config extends Model {

    use FileManaging;

	protected $fillable = ['name', 'field_type'];

    public  $fieldTypes = ['file' => 'File field', 'text' => 'Text field'];

    public function manageConfigFile($file)
    {
        $oldConfig = $this->findOrFail($this->id);
        if ($this->field_type == 'text' && $oldConfig->field_type == 'file')
            $oldConfig->deleteFile('value');
        if ($file)
            $this->manageFile($file, 'value');
    }

    static function getConfigs($names, $path = 'local')
    {
        if (empty($names))
            return [];
        $configs = self::where('name', array_shift($names));
        if (!empty($names))
            while($names)
                $configs->orWhere('name', array_shift($names));
        $configs = $configs->get();

        $result = array();
        foreach ($configs as $config)
            if ($config->field_type == 'text')
                $result[$config->name] = nl2br($config->value);
            elseif ($path == 'real') {
                $result[$config->name] = $config->getFilePath('value');
            }
            else {
                $result[$config->name] = $config->getFileRealPath('value').$config->value;
            }
        return $result;

    }
}
