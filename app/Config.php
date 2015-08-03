<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FileManaging;
class Config extends Model {

    use FileManaging;

	protected $fillable = ['name', 'field_type'];

    public  $fieldTypes = ['file' => 'File field', 'text' => 'Text field'];

    /**
     * Manges updating of config file
     *
     * @return array
     */
    public function manageConfigFile($file)
    {
        $oldType = ($oldConfig = $this->find($this->id)) ? $oldConfig->field_type : null;
        if ($this->field_type == 'text' && $oldType == 'file')
            $oldConfig->deleteFile('value');
        if ($file)
            $this->manageFile($file, 'value');
    }

    /**
     * Get config values
     *
     * @param $names array
     * @param $path string
     * @return array
     */
    static function getConfigs($names, $path = 'local')
    {
        $configs = self::requestConfig($names);
        $result = array();
        foreach ($configs as $config)
            if ($config->field_type == 'text')
                $result[$config->name] = nl2br($config->value);
            elseif ($path == 'real')
                $result[$config->name] = $config->getFileRealPath('value').$config->value;
            else
                $result[$config->name] = $config->getFilePath('value');
        return $result;
    }

    /**
     * Requests config models
     *
     * @param $names array
     * @return Collection
     */
    static function requestConfig($names)
    {
        if (empty($names))
            return [];
        $configs = self::where('name', array_shift($names));
        if (!empty($names))
            while($names)
                $configs->orWhere('name', array_shift($names));
        return $configs->get();
    }

    /**
     * Fills config values
     *
     * @param $request Request
     * @return Model
     */
    public function fillConfig($request)
    {
        $this->fill($request->all());
        if ($this->field_type == 'text')
            $this->value = $request->input('value');
        $this->manageConfigFile($request->file('value'));
        return $this;
    }
}
